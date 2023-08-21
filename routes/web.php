<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['varify' => true]);

//Home routes------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'ViewProfile'])->name('profile');

// Route::get('/edit-profile', [App\Http\Controllers\HomeController::class, 'EditProfile']);

Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'UpdateProfile']);



//Client routes------------
Route::get('/add-client', [App\Http\Controllers\ClientController::class, 'index'])->name('add.client');

Route::post('/insert-client', [App\Http\Controllers\ClientController::class, 'store']);

Route::get('/all-client', [App\Http\Controllers\ClientController::class, 'AllClient'])->name('all.client');

Route::get('/view-client/{id}', [App\Http\Controllers\ClientController::class, 'ViewClient']);

Route::get('/delete-client/{id}', [App\Http\Controllers\ClientController::class, 'DeleteClient']);

Route::get('/edit-client/{id}', [App\Http\Controllers\ClientController::class, 'EditClient']);

Route::post('/update-client/{id}', [App\Http\Controllers\ClientController::class, 'UpdateClient']);


//Employee routes------------
Route::get('/add-employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('add.employee');

Route::post('/insert-employee', [App\Http\Controllers\EmployeeController::class, 'store']);

Route::get('/all-employee', [App\Http\Controllers\EmployeeController::class, 'AllEmployee'])->name('all.employee');

Route::get('/view-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'ViewEmployee']);

Route::get('/delete-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'DeleteEmployee']);

Route::get('/edit-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'EditEmployee']);

Route::post('/update-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'UpdateEmployee']);


//Categories routes------------
Route::get('/add-category', [App\Http\Controllers\CategoreController::class, 'AddCategory'])->name('add.category');

Route::post('/insert-category', [App\Http\Controllers\CategoreController::class, 'InsertCategory']);

Route::get('/all-category', [App\Http\Controllers\CategoreController::class, 'AllCategory'])->name('all.category');

Route::get('/delete-category/{id}', [App\Http\Controllers\CategoreController::class, 'DeleteCategory']);

Route::get('/edit-category/{id}', [App\Http\Controllers\CategoreController::class, 'EditCategory']);

Route::post('/update-category/{id}', [App\Http\Controllers\CategoreController::class, 'UpdateCategory']);


//Products routes------------
Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'AddProduct'])->name('add.product');

Route::post('//insert-product', [App\Http\Controllers\ProductController::class, 'InsertProduct']);

Route::get('/all-product', [App\Http\Controllers\ProductController::class, 'AllProduct'])->name('all.product');

Route::get('/view-product/{id}', [App\Http\Controllers\ProductController::class, 'ViewProduct']);

Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'DeleteProduct']);

Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'EditProduct']);

Route::post('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'UpdateProduct']);


//Invest routes------------
Route::get('/add-invest', [App\Http\Controllers\InvestController::class, 'AddInvest'])->name('add.invest');

Route::post('/insert-invest', [App\Http\Controllers\InvestController::class, 'InsertInvest']);

Route::get('/delete-invest/{id}', [App\Http\Controllers\InvestController::class, 'DeleteInvest']);


//Today Invest routes------------
Route::get('/today-invest', [App\Http\Controllers\InvestController::class, 'ViewTodayInvest'])->name('today.invest');

Route::post('/today-invest', [App\Http\Controllers\InvestController::class, 'ViewTodayInvest']); 

Route::get('/edit-today-invest/{id}', [App\Http\Controllers\InvestController::class, 'EditTodayInvest']);

Route::post('/update-today-invest/{id}', [App\Http\Controllers\InvestController::class, 'UpdateTodayInvest']);


//Monthly Invest routes------------
Route::get('/monthly-invest', [App\Http\Controllers\InvestController::class, 'ViewMonthlyInvest'])->name('monthly.invest');

Route::post('/monthly-invest', [App\Http\Controllers\InvestController::class, 'ViewMonthlyInvest']); 

Route::get('/edit-monthly-invest/{id}', [App\Http\Controllers\InvestController::class, 'EditMonthlyInvest']);

Route::post('/update-monthly-invest/{id}', [App\Http\Controllers\InvestController::class, 'UpdateMonthlyInvest']);


//Yearly Invest routes------------
Route::get('/yearly-invest', [App\Http\Controllers\InvestController::class, 'ViewYearlyInvest'])->name('yearly.invest');

Route::post('/yearly-invest', [App\Http\Controllers\InvestController::class, 'ViewYearlyInvest']); 

Route::get('/edit-yearly-invest/{id}', [App\Http\Controllers\InvestController::class, 'EditYearlyInvest']);

Route::post('/update-yearly-invest/{id}', [App\Http\Controllers\InvestController::class, 'UpdateYearlyInvest']);


//All Invest routes------------
Route::get('/all-invest', [App\Http\Controllers\InvestController::class, 'AllInvest'])->name('all.invest');

Route::get('/edit-invest/{id}', [App\Http\Controllers\InvestController::class, 'EditAllInvest']);

Route::post('/update-invest/{id}', [App\Http\Controllers\InvestController::class, 'UpdateAllInvest']);




//Expenses routes------------
Route::get('/add-expense', [App\Http\Controllers\ExpenseController::class, 'AddExpense'])->name('add.expense');

Route::post('/insert-expense', [App\Http\Controllers\ExpenseController::class, 'InsertExpense']);

Route::get('/delete-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'DeleteExpense']);


//Today Expenses routes------------
Route::get('/today-expense', [App\Http\Controllers\ExpenseController::class, 'ViewTodayExpense'])->name('today.expense');

Route::post('/today-expense', [App\Http\Controllers\ExpenseController::class, 'ViewTodayExpense']); 

Route::get('/edit-today-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'EditTodayExpense']);

Route::post('/update-today-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'UpdateTodayExpense']);


//Monthly Expenses routes------------
Route::get('/monthly-expense', [App\Http\Controllers\ExpenseController::class, 'ViewMonthlyExpense'])->name('monthly.expense');

Route::post('/monthly-expense', [App\Http\Controllers\ExpenseController::class, 'ViewMonthlyExpense']); 

Route::get('/edit-monthly-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'EditMonthlyExpense']);

Route::post('/update-monthly-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'UpdateMonthlyExpense']);


//Yearly Expenses routes------------
Route::get('/yearly-expense', [App\Http\Controllers\ExpenseController::class, 'ViewYearlyExpense'])->name('yearly.expense');

Route::post('/yearly-expense', [App\Http\Controllers\ExpenseController::class, 'ViewYearlyExpense']); 

Route::get('/edit-yearly-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'EditYearlyExpense']);

Route::post('/update-yearly-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'UpdateYearlyExpense']);


//All Expenses routes------------
Route::get('/all-expense', [App\Http\Controllers\ExpenseController::class, 'AllExpense'])->name('all.expense');

Route::get('/edit-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'EditAllExpense']);

Route::post('/update-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'UpdateAllExpense']);



//Salary routes------------

Route::get('/pay-salary', [App\Http\Controllers\SalaryController::class, 'PaySalary'])->name('pay.salary');

Route::get('/pay-monthly-salary/{id}', [App\Http\Controllers\SalaryController::class, 'PayMonthlySalary']);

Route::post('/pay-monthly-salary/{id}', [App\Http\Controllers\SalaryController::class, 'PayMonthlySalary']);

Route::post('/insert-salary/{id}', [App\Http\Controllers\SalaryController::class, 'InsertSalary']);

Route::get('/edit-salary/{id}', [App\Http\Controllers\SalaryController::class, 'EditSalary']);

Route::post('/update-salary/{id}', [App\Http\Controllers\SalaryController::class, 'UpdateSalary']);

Route::get('/delete-salary/{id}', [App\Http\Controllers\SalaryController::class, 'DeleteSalary']);

Route::get('/all-salary', [App\Http\Controllers\SalaryController::class, 'AllSalary'])->name('all.salary');



Route::get('/all-duesalary', [App\Http\Controllers\SalaryController::class, 'AllDueSalary'])->name('pay.duesalary');

Route::get('/pay-duesalary/{id}', [App\Http\Controllers\SalaryController::class, 'PayDueSalary']);

Route::post('/update-duesalary/{id}', [App\Http\Controllers\SalaryController::class, 'UpdateDueSalary']);



Route::get('/add-advancedsalary', [App\Http\Controllers\SalaryController::class, 'AdvancedSalary'])->name('add.advancedsalary');

Route::post('/insert-advancedsalary', [App\Http\Controllers\SalaryController::class, 'InsertAdvancedSalary']);

Route::get('/all-advancedsalary', [App\Http\Controllers\SalaryController::class, 'AllAdvancedSalary'])->name('all.advancedsalary');

Route::get('/edit-advancedsalary/{id}', [App\Http\Controllers\SalaryController::class, 'EditAdvancedSalary']);

Route::post('/update-advancedsalary/{id}', [App\Http\Controllers\SalaryController::class, 'UpdateAdvancedSalary']);

Route::get('/delete-advancedsalary/{id}', [App\Http\Controllers\SalaryController::class, 'DeleteAdvancedSalary']);



//Cart routes------------
Route::get('/add-cart', [App\Http\Controllers\CartController::class, 'index']);

Route::post('/cart-update/{rowId}', [App\Http\Controllers\CartController::class, 'CartUpdate']);

Route::get('/cart-remove/{rowId}', [App\Http\Controllers\CartController::class, 'CartRemove']);

Route::post('/create-invoice', [App\Http\Controllers\CartController::class, 'CreateInvoice']);

Route::post('/insert-invoice', [App\Http\Controllers\CartController::class, 'InsertInvoice']);


//ProductOrderController routes------------
Route::get('add-order', [App\Http\Controllers\ProductOrderController::class, 'index'])->name('add.order');

Route::get('/pending-orders', [App\Http\Controllers\ProductOrderController::class, 'PendingOrders'])->name('pending.orders');

Route::get('/view-pending-order/{id}', [App\Http\Controllers\ProductOrderController::class, 'ViewPendingOrders']);

Route::get('/cancel-order/{id}', [App\Http\Controllers\ProductOrderController::class, 'CancelOrder']);


Route::post('/order-done/{id}', [App\Http\Controllers\ProductOrderController::class, 'OrderDone']);

// Route::get('/final-invoice/{id}', [App\Http\Controllers\ProductOrderController::class, 'FinalInvoice']);

Route::get('/success-orders', [App\Http\Controllers\ProductOrderController::class, 'SuccessOrders'])->name('success.orders');

Route::get('/view-success-order/{id}', [App\Http\Controllers\ProductOrderController::class, 'ViewSuccessOrders']);



//Attendance routes------------
Route::get('/take-attendance', [App\Http\Controllers\AttendanceController::class, 'TakeAttendance'])->name('take.attendance');

Route::post('/insert-attendance', [App\Http\Controllers\AttendanceController::class, 'InsertAttendance']);

Route::get('/all-attendance', [App\Http\Controllers\AttendanceController::class, 'AllAttendance'])->name('all.attendance');

Route::get('/edit-attendance/{att_date}', [App\Http\Controllers\AttendanceController::class, 'EditAttendance']);

Route::post('/update-attendance', [App\Http\Controllers\AttendanceController::class, 'UpdateAttendance']);

Route::get('/view-attendance/{att_date}', [App\Http\Controllers\AttendanceController::class, 'ViewAttendance']);

Route::get('/delete-attendance/{att_date}', [App\Http\Controllers\AttendanceController::class, 'DeleteAttendance']);



