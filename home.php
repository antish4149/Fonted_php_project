<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Food Processing - User Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        /* User profile styling */
        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3e8e41;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-weight: 500;
            font-size: 14px;
        }
        
        .user-role {
            font-size: 12px;
            color: #666;
        }
        
        .dropdown-toggle {
            margin-left: 5px;
        }
        
        .user-dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            width: 200px;
            z-index: 100;
            display: none;
        }
        
        .user-dropdown.active {
            display: block;
        }
        
        .dropdown-item {
            padding: 12px 15px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #f1f1f1;
            transition: background-color 0.3s;
        }
        
        .dropdown-item:last-child {
            border-bottom: none;
        }
        
        .dropdown-item:hover {
            background-color: #f8f8f8;
        }
        
        .dropdown-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .dropdown-divider {
            height: 1px;
            background-color: #ececec;
            margin: 5px 0;
        }
        
        /* Welcome section */
        .welcome-section {
            background-color: #f8f9fa;
            padding: 30px 0;
            margin-bottom: 30px;
        }
        
        .welcome-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .welcome-text h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .welcome-text p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .welcome-actions {
            display: flex;
            gap: 10px;
        }
        
        /* Dashboard widgets */
        .user-dashboard {
            padding: 30px 0;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .dashboard-widget {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px;
        }
        
        .widget-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .widget-header h3 {
            font-size: 18px;
            margin: 0;
        }
        
        .widget-actions {
            color: #666;
            font-size: 14px;
        }
        
        .widget-content {
            position: relative;
        }
        
        .process-status {
            margin-top: 20px;
        }
        
        .status-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .status-item:last-child {
            border-bottom: none;
        }
        
        .status-label {
            display: flex;
            align-items: center;
        }
        
        .status-icon {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .status-icon.green {
            background-color: #4CAF50;
        }
        
        .status-icon.yellow {
            background-color: #FFC107;
        }
        
        .status-icon.red {
            background-color: #F44336;
        }
        
        .recent-alerts {
            margin-top: 15px;
        }
        
        .alert-item {
            padding: 12px 0;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .alert-item:last-child {
            border-bottom: none;
        }
        
        .alert-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #fff8e1;
            color: #FFA000;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .alert-info {
            flex-grow: 1;
        }
        
        .alert-title {
            font-weight: 500;
            margin-bottom: 3px;
        }
        
        .alert-time {
            font-size: 12px;
            color: #888;
        }
        
        .chart-container {
            position: relative;
            height: 250px;
            margin-top: 15px;
        }
        
        .quick-actions {
            margin-top: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .action-button {
            padding: 8px 15px;
            background-color: #f1f1f1;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .action-button:hover {
            background-color: #e0e0e0;
        }
        
        .action-button i {
            margin-right: 5px;
        }
        
        /* Equipment list */
        .equipment-list {
            margin-top: 15px;
        }
        
        .equipment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .equipment-item:last-child {
            border-bottom: none;
        }
        
        .equipment-info {
            display: flex;
            align-items: center;
        }
        
        .equipment-icon {
            margin-right: 15px;
            color: #4CAF50;
            font-size: 18px;
        }
        
        .equipment-name {
            font-weight: 500;
        }
        
        .equipment-status {
            font-size: 13px;
            padding: 4px 10px;
            border-radius: 12px;
        }
        
        .status-operational {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        
        .status-maintenance {
            background-color: #fff8e1;
            color: #ff8f00;
        }
        
        .status-offline {
            background-color: #ffebee;
            color: #c62828;
        }
    </style>
</head>
<body>
    <!-- Updated Header with User Profile -->
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <i class="fas fa-seedling"></i> NextGen Food Processing
                </div>
                <ul class="nav-links">
                    <li><a href="#dashboard">Dashboard</a></li>
                    <li><a href="#process-monitoring">Monitoring</a></li>
                    <li><a href="#reports">Reports</a></li>
                    <li><a href="#equipment">Equipment</a></li>
                </ul>
                <div class="user-profile">
                    <div class="user-avatar">JD</div>
                    <div class="user-info">
                        <span class="user-name">John Doe</span>
                        <span class="user-role">Plant Manager</span>
                    </div>
                    <i class="fas fa-chevron-down dropdown-toggle"></i>
                    
                    <div class="user-dropdown">
                        <a href="#profile" class="dropdown-item">
                            <i class="fas fa-user"></i> My Profile
                        </a>
                        <a href="#settings" class="dropdown-item">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <a href="#notifications" class="dropdown-item">
                            <i class="fas fa-bell"></i> Notifications
                            <span class="badge">3</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <div class="welcome-container">
                <div class="welcome-text">
                    <h2>Welcome back, John!</h2>
                    <p>Here's what's happening with your food processing operations today.</p>
                </div>
                <div class="welcome-actions">
                    <a href="#export" class="btn btn-outline"><i class="fas fa-download"></i> Export Data</a>
                    <a href="#new-batch" class="btn btn-primary"><i class="fas fa-plus"></i> New Batch</a>
                </div>
            </div>
        </div>
    </section>

    <!-- User Dashboard -->
    <section id="dashboard" class="user-dashboard">
        <div class="container">
            <div class="dashboard-grid">
                <!-- Production Overview Widget -->
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h3><i class="fas fa-chart-line"></i> Production Overview</h3>
                        <div class="widget-actions">
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="chart-container">
                            <canvas id="productionChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Process Status Widget -->
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h3><i class="fas fa-tasks"></i> Process Status</h3>
                        <div class="widget-actions">
                            Last updated: 5 min ago
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="process-status">
                            <div class="status-item">
                                <div class="status-label">
                                    <span class="status-icon green"></span>
                                    <span>Harvesting Line</span>
                                </div>
                                <div>Operational</div>
                            </div>
                            <div class="status-item">
                                <div class="status-label">
                                    <span class="status-icon green"></span>
                                    <span>Sorting System</span>
                                </div>
                                <div>Operational</div>
                            </div>
                            <div class="status-item">
                                <div class="status-label">
                                    <span class="status-icon yellow"></span>
                                    <span>Processing Unit</span>
                                </div>
                                <div>Maintenance</div>
                            </div>
                            <div class="status-item">
                                <div class="status-label">
                                    <span class="status-icon green"></span>
                                    <span>Packaging Line</span>
                                </div>
                                <div>Operational</div>
                            </div>
                            <div class="status-item">
                                <div class="status-label">
                                    <span class="status-icon green"></span>
                                    <span>Cold Storage</span>
                                </div>
                                <div>Operational</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Alerts Widget -->
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h3><i class="fas fa-exclamation-circle"></i> Recent Alerts</h3>
                        <div class="widget-actions">
                            <a href="#all-alerts">View All</a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="recent-alerts">
                            <div class="alert-item">
                                <div class="alert-icon">
                                    <i class="fas fa-temperature-high"></i>
                                </div>
                                <div class="alert-info">
                                    <div class="alert-title">Temperature threshold exceeded in Cold Storage 2</div>
                                    <div class="alert-time">Today, 10:45 AM</div>
                                </div>
                            </div>
                            <div class="alert-item">
                                <div class="alert-icon">
                                    <i class="fas fa-sync"></i>
                                </div>
                                <div class="alert-info">
                                    <div class="alert-title">Maintenance scheduled for Processing Unit</div>
                                    <div class="alert-time">Today, 09:15 AM</div>
                                </div>
                            </div>
                            <div class="alert-item">
                                <div class="alert-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="alert-info">
                                    <div class="alert-title">Batch #4582 completed processing</div>
                                    <div class="alert-time">Yesterday, 3:30 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-grid">
                <!-- Nutritional Analysis Widget -->
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h3><i class="fas fa-apple-alt"></i> Nutritional Analysis</h3>
                        <div class="widget-actions">
                            Batch #4582
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="chart-container">
                            <canvas id="nutritionRetentionChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Widget -->
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
                    </div>
                    <div class="widget-content">
                        <div class="quick-actions">
                            <div class="action-button">
                                <i class="fas fa-plus"></i> New Batch
                            </div>
                            <div class="action-button">
                                <i class="fas fa-file-alt"></i> Generate Report
                            </div>
                            <div class="action-button">
                                <i class="fas fa-calendar-alt"></i> Schedule Maintenance
                            </div>
                            <div class="action-button">
                                <i class="fas fa-cog"></i> System Settings
                            </div>
                            <div class="action-button">
                                <i class="fas fa-user-plus"></i> Add User
                            </div>
                            <div class="action-button">
                                <i class="fas fa-bell"></i> Alert Settings
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Equipment Status Widget -->
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h3><i class="fas fa-tools"></i> Equipment Status</h3>
                        <div class="widget-actions">
                            <a href="#all-equipment">View All</a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="equipment-list">
                            <div class="equipment-item">
                                <div class="equipment-info">
                                    <i class="fas fa-server equipment-icon"></i>
                                    <span class="equipment-name">Main Processing Unit</span>
                                </div>
                                <span class="equipment-status status-maintenance">Maintenance</span>
                            </div>
                            <div class="equipment-item">
                                <div class="equipment-info">
                                    <i class="fas fa-fan equipment-icon"></i>
                                    <span class="equipment-name">Cooling System</span>
                                </div>
                                <span class="equipment-status status-operational">Operational</span>
                            </div>
                            <div class="equipment-item">
                                <div class="equipment-info">
                                    <i class="fas fa-box equipment-icon"></i>
                                    <span class="equipment-name">Packaging Line #1</span>
                                </div>
                                <span class="equipment-status status-operational">Operational</span>
                            </div>
                            <div class="equipment-item">
                                <div class="equipment-info">
                                    <i class="fas fa-box equipment-icon"></i>
                                    <span class="equipment-name">Packaging Line #2</span>
                                </div>
                                <span class="equipment-status status-offline">Offline</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>NextGen Food Processing</h3>
                    <p>Revolutionizing the food industry through innovative processing technologies that preserve quality and nutrition.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="#reports">Reports</a></li>
                        <li><a href="#equipment">Equipment</a></li>
                        <li><a href="#support">Support</a></li>
                        <li><a href="#help">Help Center</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Innovation Way, FoodTech Park</li>
                        <li><i class="fas fa-phone"></i> +91 1234567890</li>
                        <li><i class="fas fa-envelope"></i> support@nextgenfood.tech</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 NextGen Food Processing. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Toggle user dropdown
        document.querySelector('.user-profile').addEventListener('click', function() {
            document.querySelector('.user-dropdown').classList.toggle('active');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.user-profile')) {
                document.querySelector('.user-dropdown').classList.remove('active');
            }
        });
        
        // Initialize charts when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Production Chart
            const productionCtx = document.getElementById('productionChart').getContext('2d');
            const productionChart = new Chart(productionCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Production Output (tons)',
                        data: [65, 78, 80, 81, 92, 87],
                        borderColor: '#4CAF50',
                        backgroundColor: 'rgba(76, 175, 80, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
            // Nutrition Retention Chart
            const nutritionCtx = document.getElementById('nutritionRetentionChart').getContext('2d');
            const nutritionChart = new Chart(nutritionCtx, {
                type: 'bar',
                data: {
                    labels: ['Vitamin A', 'Vitamin C', 'Minerals', 'Enzymes', 'Antioxidants'],
                    datasets: [
                        {
                            label: 'Traditional Processing',
                            data: [45, 55, 65, 40, 50],
                            backgroundColor: 'rgba(153, 102, 255, 0.7)'
                        },
                        {
                            label: 'NextGen System',
                            data: [92, 95, 90, 88, 93],
                            backgroundColor: 'rgba(76, 175, 80, 0.7)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            title: {
                                display: true,
                                text: 'Retention %'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>