<?php
require_once('../includes/auth_check.php');
require_once('../config/database.php');

$page_title = 'Attendance Management';

// -- PHP LOGIC STARTS HERE --
// Handle search and date selection
$search = isset($_GET['search']) ? $_GET['search'] : '';
$selected_date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$today = date('Y-m-d');

// Build base query
$query = "
    SELECT el.id, el.child_fullname, el.code,
    (SELECT status FROM attendance WHERE enrollment_id = el.id AND date = '$selected_date') as attendance_status
    FROM enrollment_list el
    WHERE el.status = 1
";

// Add search condition if exists
if(!empty($search)) {
    $search = $conn->real_escape_string($search);
    $query .= " AND (el.child_fullname LIKE '%$search%' OR el.code LIKE '%$search%')";
}

$query .= " ORDER BY el.child_fullname";

$enrollments = $conn->query($query);
// -- PHP LOGIC ENDS HERE --
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inner Strength - <?= $page_title ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind Config -->
    <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            heading: ['Playfair Display', 'serif'],
          },
          colors: {
            'is-bg': '#F0F3FA',
            'is-bg-secondary': '#D5DEEF',
            'is-border': '#B1C9EF',
            'is-accent-light': '#8AAEE0',
            'is-accent-dark': '#638ECB',
            'is-text': '#395886',
          }
        }
      }
    }
    </script>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F0F3FA; }
        ::-webkit-scrollbar-thumb { background: #B1C9EF; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #8AAEE0; }
    </style>
</head>
<body class="bg-is-bg text-is-text font-sans antialiased h-screen flex overflow-hidden">

    <!-- INCLUDE SIDEBAR -->
    <?php include('../includes/sidebar.php'); ?>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <!-- Header -->
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-is-border flex items-center justify-between px-6 lg:px-10 z-30 sticky top-0">
            <div class="flex items-center">
                <button onclick="toggleSidebar()" class="lg:hidden p-2 mr-4 text-is-text hover:text-is-accent-dark transition-colors focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-2xl font-bold font-heading text-is-text">Daily Attendance</h1>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-2 text-sm text-is-text opacity-80">
                    <span>Administrator</span>
                    <div class="w-8 h-8 bg-is-accent-light rounded-full flex items-center justify-center text-white">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Scrollable Content -->
        <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 scroll-smooth">
            
            <!-- Search & Filter Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-is-border p-5 mb-8">
                <div class="flex flex-col md:flex-row gap-4 justify-between items-end md:items-center">
                    
                    <!-- Search Form -->
                    <form method="GET" class="w-full md:w-2/3 flex gap-3">
                        <input type="hidden" name="date" value="<?= $selected_date ?>">
                        <div class="relative flex-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-is-accent-dark">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" name="search" 
                                class="w-full pl-10 pr-4 py-3 bg-is-bg rounded-xl border border-transparent focus:bg-white focus:border-is-accent-light focus:ring-2 focus:ring-is-accent-light/20 outline-none transition-all text-sm"
                                placeholder="Search by child name or code..."
                                value="<?= htmlspecialchars($search) ?>">
                        </div>
                        <button type="submit" class="bg-is-accent-dark hover:bg-is-text text-white px-6 py-3 rounded-xl font-medium transition-colors shadow-md hover:shadow-lg">
                            Search
                        </button>
                        <?php if(!empty($search)): ?>
                        <a href="attendance.php?date=<?= $selected_date ?>" class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-4 py-3 rounded-xl font-medium transition-colors border border-gray-200">
                            Clear
                        </a>
                        <?php endif; ?>
                    </form>

                    <!-- Date Selector Form -->
                    <form method="GET" class="w-full md:w-auto flex items-center gap-3 bg-is-bg p-2 rounded-xl border border-is-border/50">
                        <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">
                        <input type="date" name="date" value="<?= $selected_date ?>" max="<?= $today ?>" 
                            class="bg-transparent border-none focus:ring-0 text-is-text font-medium text-sm" required>
                        <button type="submit" class="bg-white text-is-accent-dark hover:text-is-accent-light p-2 rounded-lg shadow-sm transition-colors">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Attendance Form -->
            <form action="save_attendance.php" method="POST">
                <input type="hidden" name="date" value="<?= $selected_date ?>">
                <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">

                <?php if($enrollments->num_rows > 0): ?>
                <div class="bg-white rounded-2xl shadow-lg border border-is-border overflow-hidden mb-24">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-is-bg text-is-text uppercase tracking-wider text-xs font-bold border-b border-is-border">
                                <tr>
                                    <th class="px-6 py-4">Child Name</th>
                                    <th class="px-6 py-4 hidden sm:table-cell">Code</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 min-w-[200px]">Notes</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-is-border">
                                <?php while($row = $enrollments->fetch_assoc()): ?>
                                <tr class="hover:bg-blue-50/50 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-is-text"><?= htmlspecialchars($row['child_fullname']) ?></div>
                                        <div class="text-xs text-gray-500 sm:hidden mt-1">#<?= $row['code'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 hidden sm:table-cell">
                                        <span class="bg-is-bg px-2 py-1 rounded-md font-mono text-xs border border-is-border/50">
                                            <?= $row['code'] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="relative">
                                            <select name="status[<?= $row['id'] ?>]" 
                                                class="appearance-none w-full bg-white border border-is-border text-is-text text-sm rounded-lg focus:ring-2 focus:ring-is-accent-light/50 focus:border-is-accent-light block p-2.5 pr-8 cursor-pointer hover:border-is-accent-dark transition-colors status-select"
                                                data-id="<?= $row['id'] ?>">
                                                <option value="1" <?= $row['attendance_status'] == 1 ? 'selected' : '' ?>>Present</option>
                                                <option value="0" <?= $row['attendance_status'] === '0' ? 'selected' : '' ?>>Absent</option>
                                                <option value="2" <?= $row['attendance_status'] == 2 ? 'selected' : '' ?>>Excused</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-is-accent-dark">
                                                <i class="fas fa-chevron-down text-xs"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="text" name="notes[<?= $row['id'] ?>]" 
                                            placeholder="Add a note..."
                                            class="w-full bg-transparent border-b border-transparent hover:border-is-border focus:border-is-accent-dark focus:ring-0 text-sm py-1 transition-all placeholder-gray-400"
                                            value="">
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Floating Save Bar -->
                <div class="fixed bottom-0 right-0 left-0 lg:left-64 bg-white border-t border-is-border p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)] z-20 flex justify-between items-center">
                    <div class="hidden md:block text-sm text-is-text font-medium pl-4">
                        Viewing <span class="text-is-accent-dark font-bold"><?= date('M d, Y', strtotime($selected_date)) ?></span>
                    </div>
                    <button type="submit" class="w-full md:w-auto bg-is-accent-dark hover:bg-is-text text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i>
                        <span>Save Changes</span>
                    </button>
                </div>

                <?php else: ?>
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-16 bg-white rounded-2xl border border-dashed border-is-border">
                    <div class="w-16 h-16 bg-is-bg rounded-full flex items-center justify-center text-is-border mb-4">
                        <i class="fas fa-clipboard-list text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-is-text">No Enrollments Found</h3>
                    <p class="text-gray-500 mt-1">Try adjusting your search criteria.</p>
                    <a href="../enrollments/list.php" class="mt-4 text-is-accent-dark hover:underline text-sm font-medium">View All Students</a>
                </div>
                <?php endif; ?>

            </form>
            
            <!-- Footer -->
            <footer class="mt-8 mb-24 text-center text-sm text-is-text opacity-60">
                &copy; <?= date('Y') ?> Inner Strength. All rights reserved.
            </footer>
            
        </main>
    </div>

    <!-- Visual scripts for status colors (Optional enhancement) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('.status-select');
            
            function updateColor(select) {
                select.classList.remove('text-green-600', 'text-red-500', 'text-yellow-600', 'font-semibold');
                if(select.value === '1') select.classList.add('text-green-600', 'font-semibold');
                else if(select.value === '0') select.classList.add('text-red-500', 'font-semibold');
                else if(select.value === '2') select.classList.add('text-yellow-600', 'font-semibold');
            }

            selects.forEach(select => {
                updateColor(select);
                select.addEventListener('change', () => updateColor(select));
            });
        });
    </script>

</body>
</html>
