
<!------ Include the above in your HEAD tag

---------->
<!------ Include the above in your HEAD tag ---------->

<div class="container">


    <div class="col-md-9 col-md-push-1">

        <div class="container">
            <a href="#" class="btn btn-info" role="button">Extraire </a>
            <a href="#" class="btn btn-info" role="button">Extraction horraire</a>
            <h3 class="text-center">Filtrer</h3>
            <div class="row">


                <div class="col-xs-8 col-xs-offset-2">
                    <form action="#" method="get" id="searchForm" class="input-group">

                        <div class="input-group-btn search-panel">
                            <select name="search_param" id="search_param" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <option value="all">All</option>
                                <option value="username">Username</option>
                                <option value="email">Email</option>
                                <option value="studentcode">Student Code</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="x" placeholder="Search term...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                           <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                    </form><!-- end form -->
                </div><!-- end col-xs-8 -->

            </div><!-- end row -->


        </div><!-- end container -->
    </div><!-- end col-md-9 -->

</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Archive des interventions</h4>
            <div class="table-responsive">

                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>EmployeID</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Afficher</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="View"><a class="btn btn-info btn-xs" data-title="View" data-toggle="modal" data-target="#view" href=""><span class="glyphicon glyphicon-eye-open"></span></a></p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>













