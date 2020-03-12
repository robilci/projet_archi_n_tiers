
<!------ Include the above in your HEAD tag

---------->

<div class="container">
    <!--search bar --->
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="searchbar">
                <input class="search_input" type="text" name="" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </div>
    <!--search bar --->

    <?php

    if(isset($intervention)){
        if($intervention) {
            echo '
            <div class="alert alert-info alert-dismissible show my-2" role = "alert" >';
            if (isset($message)){
                echo $message;
            } else
            {
                echo 'Intervention créee avec succès !';
            }
            echo '<button type = "button" class="close" data-dismiss = "alert" aria-label = "Close" >
                <span aria-hidden = "true" >&times;</span >
            </button >
        </div>';
            }
        }
    ?>


    <div class="row my-2">
        <div class="col-md-12">
		<?php 
		if(isset($listIntervention))
		{
			?>
            <h4>La liste des interventions</h4>
		<?php 	
		} if(isset($listTen))
		{
			?>
            <h4>La liste des 10 dernieres interventions</h4>
			
		<?php  }?>

            <div class="table-responsive">

                <table id="mytable" class="table table-bordred table-striped">

                    <thead>

                    <th>Numero</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Adresse</th>
                    <th>Nom responsable </th>
                    <th>Prénom responsable</th>
					<th>Commentaires</th>
					<th>Etat</th>
					<th>Visualiser</th>
                    </thead>
                    <tbody>
                    
						<?php if(isset($listIntervention))
							{
							
								foreach($listIntervention as $val)
								{
									
								
							
						?>
						    <tr>
                            <td><?php echo $val[0] ?></td>
                            <td><?php echo $val[1] ?></td>
                            <td><?php echo $val[2] ?></td>
                            <td><?php echo $val[3] ?></td>
							<td><?php echo $val[4] ?></td>
							<td><?php echo $val[5] ?></td>
                            <td><?php echo $val[6] ?></td>
							<td><?php echo $val[7] ?></td>
							
						

                            <td><p data-placement="top" data-toggle="tooltip" title="View"><a class="btn btn-info btn-xs" data-title="View" data-toggle="modal" data-target="#view" href="oneIntervention"><span class="glyphicon glyphicon-eye-open"></span></a></p></td>
                        </tr>
	<?php } } ?>
	
		<?php if(isset($listTen))
							{
							
								foreach($listTen as $val)
								{
									
								
							
						?>
						    <tr>
                            <td><?php echo $val[0] ?></td>
                            <td><?php echo $val[1] ?></td>
                            <td><?php echo $val[2] ?></td>
                            <td><?php echo $val[3] ?></td>
							<td><?php echo $val[4] ?></td>
							<td><?php echo $val[5] ?></td>
                            <td><?php echo $val[6] ?></td>
							<td><?php echo $val[7] ?></td>
							
						
							
                            <td><p data-placement="top" data-toggle="tooltip" title="View"><a class="btn btn-info btn-xs" data-title="View" data-toggle="modal" data-target="#view" href="oneIntervention"><span class="glyphicon glyphicon-eye-open"></span></a></p></td>
                        </tr>
	<?php } } ?>
                    </tbody>

                </table>
        </div>
    </div>
</div>












