<?php
$viewDir = 'views';
// Define your routing rules
$routes = array(
    '/' => "$viewDir/frontend/home.php",
    '/property-details' => "$viewDir/frontend/property-details.php",
    '/properties' => "$viewDir/frontend/properties.php",

    // user route
    '/login' => "$viewDir/users/login.php",
    '/registration' => "$viewDir/users/registration.php",
    '/verify_email' => "controller/verify_email.php",
    '/users/dashboard' => "$viewDir/users/dashboard.php",
    '/users/investment' => "$viewDir/users/investment.php",
    '/admin/withdraw' => "$viewDir/users/withdraw.php",
    '/user/logout' => "$viewDir/users/logout.php",
    '/reset-password' => "$viewDir/users/resetpassword.php",
    
    // admin route
    '/admin/login' => "$viewDir/admin/login.php",
    '/admin/dashboard' => "$viewDir/admin/dashboard.php",
    '/admin/logout' => "$viewDir/admin/logout.php",
    '/admin/projects' => "$viewDir/admin/projects.php",
    '/admin/projects/add' => "$viewDir/admin/add_projects.php",
    '/admin/projects/edit' => "$viewDir/admin/edit_projects.php",
    '/admin/projects/delete' => "controller/deleteController.php",
    '/admin/customers' => "$viewDir/admin/customers.php",
    '/admin/customers/delete' => "controller/deleteController.php",
    '/admin/transactions' => "$viewDir/admin/transactions.php",
    

    // payment
    '/verify-transaction' => "controller/verifyTransactionController.php",
    
    '/logout' => 'logout.php',
    '/404' => "$viewDir/404.php",
);

// Parse the requested URL
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
foreach ($routes as $route => $file) {
    // Replace any variables in the route
    $route = preg_replace('/:[^\/]+/', '([^\/]+)', $route);

    // Match the route to the URL
    if (preg_match('#^' . $route . '$#', $url, $matches)) {
        // Extract any variables from the URL
        $vars = array();
        preg_match_all('/:[^\/]+/', $route, $var_names);
        foreach ($var_names[0] as $var_name) {
            $vars[substr($var_name, 1)] = $matches[array_search($var_name, $var_names[0]) + 1];
        }

        // Route the request to the appropriate script
        require $file;
        exit;
    }
}

// If no route was matched, return a 404 error
header('HTTP/1.1 404 Not Found');
echo '404 Not Found';
