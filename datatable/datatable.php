<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <head>
        <script type="text/javascript" src="jquery-1.12.4.js"></script>
        <script type="text/javascript" src="jquery.dataTables.min.js"></script>

        <link rel="stylesheet" type="text/css" href="jquery.dataTables.css">
        <script type="application/javascript">
            $(document).ready(function() {
                $('#example').DataTable({
                    "ajax": 'arrays.txt'
                });
            });
        </script>     
        <title>Sample</title>
    </head>
    <body>
        <table id="example" class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Extn.</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Extn.</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>
    </body>
</html>