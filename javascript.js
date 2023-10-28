
function toggleManageCustomers() {
    var customerSection = document.getElementById('customerSection');
    var supplierSection = document.getElementById('supplierSection');
    var customerList = document.getElementById('customerList');
    var supplierList = document.getElementById('supplierList');

    customerSection.style.display = 'block';
    supplierSection.style.display = 'none';
    customerList.style.display = 'none';
    supplierList.style.display = 'none';
}

function toggleManageSuppliers() {
    var customerSection = document.getElementById('customerSection');
    var supplierSection = document.getElementById('supplierSection');
    var customerList = document.getElementById('customerList');
    var supplierList = document.getElementById('supplierList');

    customerSection.style.display = 'none';
    supplierSection.style.display = 'block';
    customerList.style.display = 'none';
    supplierList.style.display = 'none';
}

function viewCustomerList() {
    var customerSection = document.getElementById('customerSection');
    var supplierSection = document.getElementById('supplierSection');
    var customerList = document.getElementById('customerList');
    var supplierList = document.getElementById('supplierList');

    customerSection.style.display = 'none';
    supplierSection.style.display = 'none';
    customerList.style.display = 'block';
    supplierList.style.display = 'none';
}

function viewSupplierList() {
    var customerSection = document.getElementById('customerSection');
    var supplierSection = document.getElementById('supplierSection');
    var customerList = document.getElementById('customerList');
    var supplierList = document.getElementById('supplierList');

    customerSection.style.display = 'none';
    supplierSection.style.display = 'none';
    customerList.style.display = 'none';
    supplierList.style.display = 'block';
}