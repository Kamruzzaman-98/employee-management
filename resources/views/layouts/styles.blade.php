<style>
    body {
        margin: 0;
        font-family: Arial;
        background: #f5f5f5;
    }

    .wrapper {
        display: flex;
    }

    .sidebar {
        width: 250px;
        min-height: 100vh;
        background: #2c3e50;
    }

    .content {
        flex: 1;
    }

    .navbar {
        background: white;
        padding: 15px;
    }

    .page-content {
        padding: 20px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    .btn {
        padding: 8px 15px;
        text-decoration: none;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        background: #f4f6f9;
    }

    .wrapper {
        display: flex;
    }

    /* Sidebar */

    .sidebar {

        width: 260px;

        min-height: 100vh;

        background: #1f2937;

        color: white;

        position: fixed;

        left: 0;

        top: 0;

    }

    .logo {

        padding: 25px;

        text-align: center;

        border-bottom: 1px solid rgba(255, 255, 255, .1);

    }

    .logo h2 {

        color: #4ade80;

        margin-bottom: 5px;

    }

    .logo p {

        color: #cbd5e1;

        font-size: 14px;

    }

    .menu {

        list-style: none;

        margin-top: 20px;

    }

    .menu li {

        margin: 6px 12px;

    }

    .menu li a {

        display: block;

        color: #d1d5db;

        text-decoration: none;

        padding: 12px 15px;

        border-radius: 8px;

        transition: .3s;

    }

    .menu li a:hover {

        background: #4ade80;

        color: #111827;

        padding-left: 22px;

    }

    .content {

        margin-left: 260px;

        width: 100%;

    }

    .navbar {

        background: white;

        padding: 18px;

        box-shadow: 0 2px 5px rgba(0, 0, 0, .1);

    }

    .page-content {

        padding: 25px;

    }

    .card {

        background: white;

        border-radius: 10px;

        padding: 20px;

        box-shadow: 0 0 10px rgba(0, 0, 0, .08);

    }


    /* Department Page */


    .card {

        background: white;

        border-radius: 15px;

        padding: 25px;

        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);

    }


    /* Header */


    .card-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 25px;

    }


    .card-header h2 {

        font-size: 24px;

        color: #1f2937;

        margin-bottom: 5px;

    }


    .card-header p {

        color: #6b7280;

        font-size: 14px;

    }



    /* Add Button */


    .add-btn {

        background: #2563eb;

        color: white;

        padding: 12px 20px;

        border-radius: 8px;

        text-decoration: none;

        font-weight: 500;

        transition: .3s;

    }


    .add-btn:hover {

        background: #1d4ed8;

    }



    /* Table */


    .table-wrapper {

        overflow-x: auto;

    }


    .custom-table {

        width: 100%;

        border-collapse: collapse;

    }



    .custom-table thead {

        background: #f1f5f9;

    }



    .custom-table th {

        padding: 15px;

        text-align: left;

        color: #475569;

        font-size: 14px;

    }



    .custom-table td {

        padding: 15px;

        border-bottom: 1px solid #e5e7eb;

        color: #374151;

    }



    .custom-table tbody tr:hover {

        background: #f8fafc;

    }



    /* Department Name */


    .department-name {

        display: flex;

        align-items: center;

        gap: 12px;

        font-weight: 600;

    }


    .icon {

        width: 35px;

        height: 35px;

        background: #dbeafe;

        border-radius: 50%;

        display: flex;

        align-items: center;

        justify-content: center;

    }



    /* Action Button */


    .action-btn {

        padding: 8px 14px;

        border-radius: 7px;

        text-decoration: none;

        border: none;

        cursor: pointer;

        font-size: 14px;

    }



    .action-btn.edit {

        background: #fef3c7;

        color: #92400e;

    }



    .action-btn.delete {

        background: #fee2e2;

        color: #b91c1c;

    }



    .action-btn:hover {

        opacity: .8;

    }



    /* Empty */


    .empty {

        text-align: center;

        padding: 30px;

        color: #9ca3af;

    }
</style>
