<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Prevent Back Starts Here
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Route::get('/dashboard', function () {
$productsCount = DB::table('products')->get();
$userCount = DB::table('users')->get();
$customersCount = DB::table('customers')->get();
$supplierCount = DB::table('suppliers')->get();
$invoiceData = App\Models\Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->take(5)->get();
$purchaseData = App\Models\Purchase::orderBy('date','desc')->orderBy('id','desc')->take(5)->latest()->get();

$currentProducts = Product::orderBy('quantity','asc')->take(3)->latest()->get();


// }

$productlines = App\Models\Product::select("name", "quantity")->get();
$resultpie[] = ['Names','Qty'];
    foreach ($productlines as $key => $value) {
    $resultpie[++$key] = [$value->name, (int)$value->quantity];
}

return view('admin.index', compact('productsCount','userCount','customersCount','supplierCount','invoiceData','currentProducts',
    'purchaseData','resultpie'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::middleware(['auth','role:admin'])->group(function() {
//     Route::controller(BrandController::class)->group(function(){
//     Route::get('/all/brand' , 'AllBrand')->name('all.brand');
// });
// }); // end middleware


//Admin All Routes
// Manage Admin Routes
// Route::group(['middleware' => 'auth','role:admin'],function(){
Route::middleware('auth')->group(function(){
// });


    // User Management All Routes
Route::prefix('users')->group(function () {

    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/profile/edit', [AdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    Route::get('/', [AdminController::class, 'AdminGoogleLineChart'])->name('product.line');
});


// Supplier Management Route
Route::prefix('supplier')->group(function () {
    Route::get('/view', [SupplierController::class, 'SupplierView'])->name('supplier.view');
    Route::get('/add', [SupplierController::class, 'SupplierAdd'])->name('supplier.add');
    Route::post('/stores', [SupplierController::class, 'Supplierstore'])->name('supplier.store');
    Route::get('/edit/{id}', [SupplierController::class, 'SupplierEdit'])->name('supplier.edit');
    Route::post('/update/{id}', [SupplierController::class, 'SupplierUpdate'])->name('supplier.update');
    Route::get('/delete/{id}', [SupplierController::class, 'SupplierDelete'])->name('supplier.delete');
    });

    // Customer Management Route
Route::prefix('customer')->group(function () {
    Route::get('/view', [CustomerController::class, 'CustomerView'])->name('customer.view');
    Route::get('/add', [CustomerController::class, 'CustomerAdd'])->name('customer.add');
    Route::post('/stores', [CustomerController::class, 'Customerstore'])->name('customer.store');
    Route::get('/edit/{id}', [CustomerController::class, 'CustomerEdit'])->name('customer.edit');
    Route::post('/update/{id}', [CustomerController::class, 'CustomerUpdate'])->name('customer.update');
    Route::get('/delete/{id}', [CustomerController::class, 'CustomerDelete'])->name('customer.delete');


    Route::get('/credit', [CustomerController::class, 'CreditCustomer'])->name('customer.credit');
    Route::get('/credit-print-pdf', [CustomerController::class, 'CreditCustomerPrintPdf'])->name('credit.customer.print.pdf');

    Route::get('/edit-invoice/{invoice_id}',[CustomerController::class, 'CustomerEditInvoice'])->name('customer.edit.invoice');
    Route::post('/update-invoice/{invoice_id}',[CustomerController::class, 'CustomerUpdateInvoice'])->name('customer.update.invoice');
    Route::get('/invoice-details/{invoice_id}',[CustomerController::class, 'CustomerInvoiceDetails'])->name('customer.invoice.details.pdf');


    Route::get('/paid', [CustomerController::class, 'PaidCustomer'])->name('customer.paid');
    Route::get('/paid-print/pdf', [CustomerController::class, 'PaidCustomerPrintPdf'])->name('paid.customer.print.pdf');


    Route::get('/wise-report', [CustomerController::class, 'CustomerWiseReport'])->name('customer.wise.report');
    Route::get('/wise-credit-report', [CustomerController::class, 'CustomerWiseCreditReport'])->name('customer.wise.credit.report');
    Route::get('/wise-paid-report', [CustomerController::class, 'CustomerWisePaidReport'])->name('customer.wise.paid.report');
    });

    // Unit Management Route
Route::prefix('unit')->group(function () {
    Route::get('/view', [UnitController::class, 'UnitView'])->name('unit.view');
    Route::get('/add', [UnitController::class, 'UnitAdd'])->name('unit.add');
    Route::post('/stores', [UnitController::class, 'Unitstore'])->name('unit.store');
    Route::get('/edit/{id}', [UnitController::class, 'UnitEdit'])->name('unit.edit');
    Route::post('/update/{id}', [UnitController::class, 'UnitUpdate'])->name('unit.update');
    Route::get('/delete/{id}', [UnitController::class, 'UnitDelete'])->name('unit.delete');
    });

    // Category Management Route
Route::prefix('category')->group(function () {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('category.view');
    Route::get('/add', [CategoryController::class, 'CategoryAdd'])->name('category.add');
    Route::post('/stores', [CategoryController::class, 'Categorystore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
    });

    // Product Management Route
Route::prefix('product')->group(function () {
    Route::get('/view', [ProductController::class, 'ProductView'])->name('product.view');
    Route::get('/add', [ProductController::class, 'ProductAdd'])->name('product.add');
    Route::post('/stores', [ProductController::class, 'Productstore'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class, 'ProductUpdate'])->name('product.update');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    Route::get('/product-current-stock', [ProductController::class, 'ProductCurrentStockView'])->name('product-current-stock.view');

    Route::get('/line', [ProductController::class, 'productGoogleLineChart'])->name('product.line');
    });

// Purchase Management Route
Route::prefix('purchase')->group(function () {
    Route::get('/view', [PurchaseController::class, 'PurchaseView'])->name('purchase.view');
    Route::get('/add', [PurchaseController::class, 'PurchaseAdd'])->name('purchase.add');
    Route::post('/stores', [PurchaseController::class, 'Purchasestore'])->name('purchase.store');
    Route::get('/edit/{id}', [PurchaseController::class, 'PurchaseEdit'])->name('purchase.edit');
    Route::post('/update/{id}', [PurchaseController::class, 'PurchaseUpdate'])->name('purchase.update');
    Route::get('/delete/{id}', [PurchaseController::class, 'PurchaseDelete'])->name('purchase.delete');
    Route::get('/pending-view', [PurchaseController::class, 'PurchasePendingView'])->name('pending.view');
    Route::get('/approve/{id}', [PurchaseController::class, 'PurchaseApprove'])->name('purchase.approve');
    });

//  Default All Route
Route::prefix('purchase')->group(function () {
    Route::get('/get-category', [DefaultController::class, 'GetCategory'])->name('get-category');
    Route::get('/get-product', [DefaultController::class, 'GetProduct'])->name('get-product');
    Route::get('/check-product', [DefaultController::class, 'GetStock'])->name('check-product-stock');
    });

// Invoice Management Route
Route::prefix('invoice')->group(function () {
    Route::get('/view', [InvoiceController::class, 'InvoiceView'])->name('invoice.view');
    Route::get('/add', [InvoiceController::class, 'InvoiceAdd'])->name('invoice.add');
    Route::post('/stores', [InvoiceController::class, 'Invoicestore'])->name('invoice.store');
    Route::get('/pending-list', [InvoiceController::class, 'InvoicePendingList'])->name('invoice.pending.list');
    Route::get('/delete/{id}', [InvoiceController::class, 'InvoiceDelete'])->name('invoice.delete');
    Route::get('/approve/{id}', [InvoiceController::class, 'InvoiceApprove'])->name('invoice.approve');
    Route::post('/approve-store/{id}', [InvoiceController::class, 'InvoiceApprovalStore'])->name('invoice.approval.store');
    Route::get('/print-invoice-list', [InvoiceController::class, 'PrintInvoiceList'])->name('print.invoice.list');
    Route::get('/print-invoice/{id}', [InvoiceController::class, 'PrintInvoice'])->name('print.invoice');
    Route::get('/daily-invoice-report', [InvoiceController::class, 'DailyInvoiceReport'])->name('daily.invoice.report');
    Route::get('/daily-invoice-pdf', [InvoiceController::class, 'DailyInvoicePdf'])->name('daily.invoice.pdf');

    });

//  Default All Route
Route::prefix('stock')->group(function () {
    Route::get('/report', [StockController::class, 'StockReport'])->name('stock.report');
    Route::get('/report-pdf', [StockController::class, 'StockReportPdf'])->name('stock.report.pdf');
    Route::get('/supplier-wise', [StockController::class, 'StockSupplierWise'])->name('stock.supplier.wise');

    Route::get('/supplier-wise-pdf', [StockController::class, 'SupplierWisePdf'])->name('supplier.wise.pdf');
    Route::get('/product-wise-pdf', [StockController::class, 'ProductWisePdf'])->name('product.wise.pdf');
    });

    // Role Management Route
    Route::prefix('role')->group(function () {
        Route::get('/view', [RoleController::class, 'RoleView'])->name('role.view');
        Route::get('/add', [RoleController::class, 'RoleAdd'])->name('role.add');
        Route::post('/stores', [RoleController::class, 'Rolestore'])->name('role.store');
        Route::get('/edit/{id}', [RoleController::class, 'RoleEdit'])->name('role.edit');
        Route::post('/update/{id}', [RoleController::class, 'RoleUpdate'])->name('role.update');
        Route::get('/delete/{id}', [RoleController::class, 'RoleDelete'])->name('role.delete');
        });




});//End  middleware Auth Route

}); //prevent-back-history





