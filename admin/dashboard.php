<?php
require_once('../includes/auth_check.php');
require_once('../config/database.php');

$page_title = 'Admin Dashboard';

$id = $_SESSION['user_id'] ?? $_SESSION['id'] ?? 0;

// --- DATA FETCHING ---
// Get stats for dashboard
$therapists_count = $conn->query("SELECT COUNT(*) FROM therapist_list")->fetch_row()[0];
$enrollments_count = $conn->query("SELECT COUNT(*) FROM enrollment_list")->fetch_row()[0];
$pending_enrollments = $conn->query("SELECT COUNT(*) FROM enrollment_list WHERE status = 0")->fetch_row()[0];
$confirmed_enrollments = $conn->query("SELECT COUNT(*) FROM enrollment_list WHERE status = 1")->fetch_row()[0];

// Get monthly enrollment data for chart
$monthly_enrollments = [];
$enrollment_query = $conn->query("SELECT DATE_FORMAT(date_created, '%Y-%m') as month, COUNT(*) as count FROM enrollment_list GROUP BY DATE_FORMAT(date_created, '%Y-%m') ORDER BY month ASC LIMIT 6");
while ($row = $enrollment_query->fetch_assoc()) {
    $monthly_enrollments[$row['month']] = $row['count'];
}

// Get therapy distribution data
$therapy_distribution = [];
$therapy_query = $conn->query("SELECT t.name, COUNT(ts.id) as session_count FROM therapy_sessions ts JOIN therapy_list t ON ts.therapy_id = t.id GROUP BY ts.therapy_id ORDER BY session_count DESC");
while ($row = $therapy_query->fetch_assoc()) {
    $therapy_distribution[$row['name']] = $row['session_count'];
}

// Get payment status data
$payment_stats = [
    'paid' => $conn->query("SELECT COUNT(*) FROM invoice_list WHERE payment_status = 'paid'")->fetch_row()[0],
    'partial' => $conn->query("SELECT COUNT(*) FROM invoice_list WHERE payment_status = 'partial'")->fetch_row()[0],
    'unpaid' => $conn->query("SELECT COUNT(*) FROM invoice_list WHERE payment_status = 'unpaid'")->fetch_row()[0]
];

// Get recent sessions
$recent_sessions = [];
$sessions_query = $conn->query("
    SELECT ts.id, ts.session_date, ts.status, e.child_fullname, t.name as therapy_name, th.fullname as therapist_name
    FROM therapy_sessions ts
    JOIN enrollment_list e ON ts.enrollment_id = e.id
    JOIN therapy_list t ON ts.therapy_id = t.id
    JOIN therapist_list th ON ts.therapist_id = th.id
    ORDER BY ts.session_date DESC LIMIT 5
");
while ($row = $sessions_query->fetch_assoc()) {
    $recent_sessions[] = $row;
}
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
    
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

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
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #F0F3FA; 
        }
        ::-webkit-scrollbar-thumb {
            background: #B1C9EF; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #8AAEE0; 
        }
    </style>
</head>
<body class="bg-is-bg text-is-text font-sans antialiased h-screen flex overflow-hidden">

    <!-- INCLUDE SIDEBAR HERE -->
    <!-- The sidebar component handles its own responsive classes (hidden on mobile, fixed drawer) -->
    <?php include('../includes/sidebar.php'); ?>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <!-- Top Header -->
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-is-border flex items-center justify-between px-6 lg:px-10 z-30 sticky top-0">
            <div class="flex items-center">
                <!-- Hamburger Button triggers toggleSidebar() defined in sidebar.php -->
                <button onclick="toggleSidebar()" class="lg:hidden p-2 mr-4 text-is-text hover:text-is-accent-dark transition-colors focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-2xl font-bold font-heading text-is-text">Dashboard Overview</h1>
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
        <main class="flex-1 overflow-y-auto p-6 lg:p-10 scroll-smooth">
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
                <!-- Stat 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-is-border group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-is-text opacity-70 uppercase tracking-wide">Total Therapists</p>
                            <h3 class="text-3xl font-bold text-is-text mt-2"><?= $therapists_count ?></h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-is-accent-dark group-hover:bg-is-accent-dark group-hover:text-white transition-colors">
                            <i class="fas fa-user-md text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-is-border group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-is-text opacity-70 uppercase tracking-wide">Total Enrollments</p>
                            <h3 class="text-3xl font-bold text-is-text mt-2"><?= $enrollments_count ?></h3>
                        </div>
                        <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600 group-hover:bg-green-500 group-hover:text-white transition-colors">
                            <i class="fas fa-child text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-is-border group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-is-text opacity-70 uppercase tracking-wide">Pending Requests</p>
                            <h3 class="text-3xl font-bold text-is-text mt-2"><?= $pending_enrollments ?></h3>
                        </div>
                        <div class="w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center text-yellow-600 group-hover:bg-yellow-500 group-hover:text-white transition-colors">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-is-border group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-is-text opacity-70 uppercase tracking-wide">Active Sessions</p>
                            <h3 class="text-3xl font-bold text-is-text mt-2"><?= $confirmed_enrollments ?></h3>
                        </div>
                        <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-10">
                <h2 class="text-lg font-bold text-is-text mb-4 flex items-center">
                    <i class="fas fa-bolt text-yellow-500 mr-2"></i> Quick Actions
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="../therapists/add.php" class="flex flex-col items-center justify-center p-6 bg-white border border-is-border rounded-2xl shadow-sm hover:shadow-lg hover:border-is-accent-light transition-all duration-300 group">
                        <div class="w-10 h-10 mb-3 bg-is-bg rounded-full flex items-center justify-center text-is-accent-dark group-hover:bg-is-accent-dark group-hover:text-white transition-colors">
                            <i class="fas fa-plus"></i>
                        </div>
                        <span class="font-semibold text-sm text-is-text">Add Therapist</span>
                    </a>
                    <a href="../enrollments/add.php" class="flex flex-col items-center justify-center p-6 bg-white border border-is-border rounded-2xl shadow-sm hover:shadow-lg hover:border-is-accent-light transition-all duration-300 group">
                        <div class="w-10 h-10 mb-3 bg-is-bg rounded-full flex items-center justify-center text-is-accent-dark group-hover:bg-is-accent-dark group-hover:text-white transition-colors">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <span class="font-semibold text-sm text-is-text">New Enrollment</span>
                    </a>
                    <a href="../sessions/schedule.php" class="flex flex-col items-center justify-center p-6 bg-white border border-is-border rounded-2xl shadow-sm hover:shadow-lg hover:border-is-accent-light transition-all duration-300 group">
                        <div class="w-10 h-10 mb-3 bg-is-bg rounded-full flex items-center justify-center text-is-accent-dark group-hover:bg-is-accent-dark group-hover:text-white transition-colors">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <span class="font-semibold text-sm text-is-text">Schedule Session</span>
                    </a>
                    <a href="../invoices/create.php" class="flex flex-col items-center justify-center p-6 bg-white border border-is-border rounded-2xl shadow-sm hover:shadow-lg hover:border-is-accent-light transition-all duration-300 group">
                        <div class="w-10 h-10 mb-3 bg-is-bg rounded-full flex items-center justify-center text-is-accent-dark group-hover:bg-is-accent-dark group-hover:text-white transition-colors">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <span class="font-semibold text-sm text-is-text">Create Invoice</span>
                    </a>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                <!-- Enrollment Trends -->
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-is-border">
                    <h3 class="text-lg font-bold text-is-text mb-6">Enrollment Trends</h3>
                    <div class="relative h-64 w-full">
                        <canvas id="enrollmentChart"></canvas>
                    </div>
                </div>
                
                <!-- Therapy Distribution -->
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-is-border">
                    <h3 class="text-lg font-bold text-is-text mb-6">Therapy Distribution</h3>
                    <div class="relative h-64 w-full flex justify-center">
                        <canvas id="therapyChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Bottom Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
                <!-- Recent Sessions Table -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg border border-is-border overflow-hidden">
                    <div class="p-6 border-b border-is-border flex justify-between items-center">
                        <h3 class="text-lg font-bold text-is-text">Recent Sessions</h3>
                        <a href="../sessions/list.php" class="text-sm text-is-accent-dark hover:text-is-accent-light font-semibold">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-is-bg text-is-text uppercase tracking-wider font-semibold">
                                <tr>
                                    <th class="px-6 py-4">Child</th>
                                    <th class="px-6 py-4">Therapy</th>
                                    <th class="px-6 py-4 hidden sm:table-cell">Therapist</th>
                                    <th class="px-6 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-is-border">
                                <?php foreach ($recent_sessions as $session): ?>
                                <tr class="hover:bg-blue-50/50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-is-text"><?= $session['child_fullname'] ?></td>
                                    <td class="px-6 py-4 text-gray-600"><?= $session['therapy_name'] ?></td>
                                    <td class="px-6 py-4 text-gray-600 hidden sm:table-cell"><?= $session['therapist_name'] ?></td>
                                    <td class="px-6 py-4">
                                        <?php if ($session['status'] == 0): ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Scheduled
                                            </span>
                                        <?php elseif ($session['status'] == 1): ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Completed
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Cancelled
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Invoice Status (Small Chart) -->
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-is-border flex flex-col">
                    <h3 class="text-lg font-bold text-is-text mb-6">Payment Status</h3>
                    <div class="relative h-48 w-full flex-1">
                        <canvas id="invoiceChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="text-center text-sm text-is-text opacity-60 py-6 border-t border-is-border">
                &copy; <?= date('Y') ?> Inner Strength. All rights reserved.
            </footer>

        </main>
    </div>

    <!-- Chart Configuration Script -->
    <script>
        // --- Enrollment Chart ---
        const enrollmentCtx = document.getElementById('enrollmentChart').getContext('2d');
        // Create gradient
        let gradient = enrollmentCtx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(138, 174, 224, 0.5)'); // is-accent-light
        gradient.addColorStop(1, 'rgba(255, 255, 255, 0.0)');

        new Chart(enrollmentCtx, {
            type: 'line',
            data: {
                labels: [<?php 
                    foreach (array_keys($monthly_enrollments) as $month) {
                        echo "'" . date('M', strtotime($month . '-01')) . "', ";
                    }
                ?>],
                datasets: [{
                    label: 'Enrollments',
                    data: [<?php echo implode(', ', array_values($monthly_enrollments)); ?>],
                    borderColor: '#638ECB', // is-accent-dark
                    backgroundColor: gradient,
                    borderWidth: 3,
                    fill: true,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#638ECB',
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    tension: 0.4 // Smooth curve
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#F0F3FA', borderDash: [5, 5] },
                        ticks: { color: '#395886', font: { family: 'Inter' } }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#395886', font: { family: 'Inter' } }
                    }
                }
            }
        });

        // --- Therapy Distribution Chart ---
        const therapyCtx = document.getElementById('therapyChart').getContext('2d');
        new Chart(therapyCtx, {
            type: 'doughnut',
            data: {
                labels: [<?php 
                    foreach (array_keys($therapy_distribution) as $therapy) {
                        echo "'" . $therapy . "', ";
                    }
                ?>],
                datasets: [{
                    data: [<?php echo implode(', ', array_values($therapy_distribution)); ?>],
                    backgroundColor: [
                        '#638ECB', // is-accent-dark
                        '#8AAEE0', // is-accent-light
                        '#B1C9EF', // is-border
                        '#D5DEEF', // is-bg-secondary
                        '#395886', // is-text
                        '#F59E0B'  // Amber (for variety)
                    ],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { color: '#395886', font: { family: 'Inter', size: 11 }, padding: 20 }
                    }
                }
            }
        });

        // --- Invoice Status Chart ---
        const invoiceCtx = document.getElementById('invoiceChart').getContext('2d');
        new Chart(invoiceCtx, {
            type: 'bar',
            data: {
                labels: ['Paid', 'Partial', 'Unpaid'],
                datasets: [{
                    label: 'Count',
                    data: [
                        <?= $payment_stats['paid'] ?>, 
                        <?= $payment_stats['partial'] ?>, 
                        <?= $payment_stats['unpaid'] ?>
                    ],
                    backgroundColor: [
                        '#10B981', // Green
                        '#F59E0B', // Yellow
                        '#EF4444'  // Red
                    ],
                    borderRadius: 8,
                    barThickness: 40
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#F0F3FA' },
                        ticks: { stepSize: 1, color: '#395886' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#395886' }
                    }
                }
            }
        });
    </script>
</body>
</html>
