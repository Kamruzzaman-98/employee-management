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

        min-height: 100vh;

    }

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

        width: calc(100% - 260px);

        min-height: 100vh;

        display: flex;

        flex-direction: column;

    }

    .navbar {

        background: white;

        padding: 18px;

        box-shadow: 0 2px 5px rgba(0, 0, 0, .1);

    }

    .page-content {

        padding: 25px;

        flex: 1;

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

    .footer {

        background: white;

        padding: 15px;

        text-align: center;

        color: #64748b;

        border-top: 1px solid #e5e7eb;

        margin-top: auto;

    }

    /* Navbar */


    .navbar {

        height: 75px;

        background: white;

        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 0 30px;

        box-shadow: 0 3px 10px rgba(0, 0, 0, .08);

    }


    /* Left */


    .nav-left h3 {

        color: #1f2937;

        font-size: 22px;

        margin-bottom: 5px;

    }


    .nav-left span {

        color: #64748b;

        font-size: 13px;

    }



    /* Right */


    .nav-right {

        display: flex;

        align-items: center;

        gap: 20px;

    }



    .user-info {

        display: flex;

        align-items: center;

        gap: 12px;

    }



    .user-avatar {

        width: 45px;

        height: 45px;

        border-radius: 50%;

        background: #2563eb;

        color: white;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;

        font-weight: bold;

    }



    .user-details {

        display: flex;

        flex-direction: column;

    }



    .user-details strong {

        color: #1f2937;

        font-size: 15px;

    }



    /* Logout */


    .logout-btn {

        background: #ef4444;

        color: white;

        padding: 10px 18px;

        border-radius: 8px;

        text-decoration: none;

        font-size: 14px;

        transition: .3s;

    }


    .form-wrapper {
        max-width: 500px;
    }



    .form-group {
        margin-bottom: 20px;
    }



    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }



    .form-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
    }



    .button-group {
        margin-top: 20px;
    }



    .btn {
        padding: 10px 18px;
        border-radius: 6px;
        border: none;
        color: white;
        text-decoration: none;
        cursor: pointer;
        display: inline-block;
    }



    .save-btn {
        background: #16a34a;
    }



    .back-btn {
        background: #333;
        margin-left: 10px;
    }

    .update-btn {
        background: #f59e0b;
    }

    .status {
        padding: 5px 12px;
        border-radius: 20px;
        color: white;
        font-size: 13px;
        font-weight: bold;
    }


    .status.active {
        background: #16a34a;
    }


    .status.inactive {
        background: #dc2626;
    }

    .form-wrapper {
        max-width: 600px;
    }


    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 15px;
    }


    .form-group textarea {
        resize: vertical;
    }


    .error {
        color: #dc2626;
        font-size: 14px;
        margin-top: 5px;
    }

    .desc {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    .action-btn.view {
        background: #0891b2;
    }


    .action-btn.view:hover {
        background: #0e7490;
    }


    small {
        color: #666;
    }

    .row {
        display: flex;
        gap: 15px;
    }


    .row .form-group {
        flex: 1;
    }


    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
    }


    .error {
        color: #dc2626;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
