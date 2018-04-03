<!-- Create Project Modal -->
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create New Projects</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="" action="projects.php" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row justify-content-md-center">
                                <label for="project-name" class="col-3 col-form-label text-right">Project Name </label>
                                <div class="col-8">
                                    <input class="form-control" type="text" id="project-name" name="project-name" placeholder="Enter the new project name...">
                                </div>
                            </div>
                            <div class="form-group row justify-content-md-center">
                                <label for="projectType" class="col-3 col-form-label text-right">Project Type </label>
                                <div class="col-8">
                                    <select class="form-control" id="projectType" name="projectType">
                                        <?php
                                        $pro_type = $crud->getData("SELECT DISTINCT project_type FROM project");
                                        echo "<option name='project-type' disabled selected>Select Category</option>";

                                        foreach ($pro_type as $item => $type) {

                                            echo "<option value='".$type['project_type']."'>".$type['project_type']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row justify-content-md-center">
                                <label for="projectLeader" class="col-3 col-form-label text-right">Project Leader </label>
                                <div class="col-8">
                                    <select class="form-control" id="projectLeader">
                                        <?php
                                        $member = $crud->getData("SELECT DISTINCT name FROM user ORDER BY name");
                                        echo "<option name='projectLeader' id='projectLeader' disabled selected>Select Leaader</option>";

                                        foreach ($member as $mem_col => $mem_row){
                                            echo "<option value='".$mem_row['name']."' >".$mem_row['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row justify-content-md-center">
                                <label for="projectMembers" class="col-3 col-form-label text-right">Project Members </label>
                                <div class="col-8">
                                    <select class="form-control js-example-basic-multiple" name="projectMembers[]" id="projectMembers" multiple="multiple">
                                        <?php
                                        foreach ($member as $mem_col => $mem_row){
                                            echo "<option>".$mem_row['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row justify-content-md-center">
                                <label for="startDate" class="col-3 col-form-label text-right">Starting Date </label>
                                <div class="col-8">
                                    <input class="form-control" type="date" id="startDate" name="startDate">
                                </div>
                            </div>
                            <div class="form-group row justify-content-md-center">
                                <label for="projectSummery" class="col-3 col-form-label text-right">Project Summery </label>
                                <div class="col-8">
                                    <textarea id="projectSummery" name="projectSummery" rows="8" class="form-control" placeholder="Write the summery of this project..."></textarea>
                                </div>
                            </div>
                            <div class="form-group row justify-content-md-center">
                                <label for="deadline" class="col-3 col-form-label text-right">Deadline </label>
                                <div class="col-8">
                                    <input class="form-control" type="date" id="deadline" name="deadline">
                                </div>
                            </div>
                            <div class="form-group row justify-content-md-center">
                                <div class="offset-8 col-3">
                                    <div class="text-right">
                                        <input name="create-project" id="create-project" class="btn btn-primary btn-block" type="submit" value="Create Project">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- End of Create Project Modal -->
