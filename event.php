<?php
$page = "event";

include 'support/header.php';

?>
<?php
if (isset($_SESSION["EVENT_ID"])) {
    $id = $_SESSION["EVENT_ID"];
    unset($_SESSION["EVENT_ID"]);

    $sql = "SELECT * FROM events WHERE e_id ='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $event = mysqli_fetch_assoc($result);

?>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $event["e_name"]; ?></h1>
                </div>
                <img src="uploadFiles/images/<?php echo $event["e_image"]; ?>" alt="Event Image" class="card-img-top" style="transform: none;">
                <div class="card-body">
                    <div class="row">
                        <h6 style="font-size: 1em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Post date:<?php echo $event["e_postDate"]; ?> </h6>
                    </div>
                    <div class="card-text">
                        <p><?php echo $event["e_description"]; ?></p>
                    </div>
                </div>
                <div class="card-footer">
                    <h1 style="font-size: 1em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Event Date: <?php echo $event["e_date"]; ?></h1>
                </div>
            </div>
            <div class="row m-1 justify-content-center">
                <div class="col">
                    <form action="php/event-add.php" method="GET">
                        <input type="hidden" name="edit_id" value="<?php echo $event["e_id"]; ?>">
                        <input type="submit" class="btn btn-success" name="event_edit" id="event_edit" style="background:green; " value="Edit">
                    </form>
                </div>
            </div>
            <div class="row m-1 justify-content-center">
                <div class="col">
                    <form action="php/event-add.php" method="GET">
                        <input type="hidden" name="delete_id" value="<?php echo $event["e_id"]; ?>">
                        <input type="submit" class="btn btn-success" value="Delete" name="event_delete" id="event_delete" onclick="return confirm('Are you sure to delete this event?');">
                    </form>
                </div>
            </div>
        </div>

        <?php
        include 'support/footer.php';
        ?>

    <?php
    } else {
        die("Error" . mysqli_error());
    }
} else {

    if (isset($_SESSION["EDIT"])) {
        if ($_SESSION["EDIT"] == "success") {

            $e_id = $_SESSION["EDIT_ID"];

            $sql = "SELECT * FROM events WHERE e_id = '$e_id'";
            $result = mysqli_query($conn, $sql);


            $edit_event = mysqli_fetch_assoc($result);
            unset($_SESSION["EDIT"]);
            unset($_SESSION["EDIT_ID"]);
        } else {
            unset($_SESSION["EDIT"]);
            unset($_SESSION["EDIT_ID"]);
            die("Error on Edit" . mysqli_error($conn));
        }
    }
    ?>

    <body>
        <div class="container">
            <div class="m-2 m-md-0">
                <h1 class="font-weight-bold event_topic">Event planner</h1>
                <p class="text-muted">Add events which organized by the secretary deviation</p>
            </div>
            <div class="row m-2 m-lg-0 justify-content-md-center">
                <form method="post" action="php/event-add.php" enctype="multipart/form-data" onsubmit="return validateForm()" class="event_form col-lg-8" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    <div>

                        <div class="form-group ">
                            <label for="event_name">Event Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-font"></i></div>
                                </div>
                                <input type="text" name="event_name" id="event_name" class="form-control" value="<?php if (isset($edit_event)) {
                                                                                                                        echo $edit_event['e_name'];
                                                                                                                    } ?>" placeholder="Event Name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="event_date">Event Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                </div>
                                <input type="date" name="event_date" id="event_date" value="<?php if (isset($edit_event)) {
                                                                                                echo $edit_event['e_date'];
                                                                                            } ?>" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="event_image">Event Image</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-image"></i></div>
                                </div>
                                <input type="file" name="event_image" value="<?php if (isset($edit_event)) {
                                                                                    echo $edit_event['e_image'];
                                                                                } ?>" id="event_image" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="event_description">Event Description</label>
                            <div class="input-group">
                                <textarea class="form-control" name="event_description" id="event_description" cols="0" rows="10"><?php if (isset($edit_event)) {
                                                                                                                                        echo $edit_event['e_description'];
                                                                                                                                    } ?> </textarea>
                            </div>
                        </div>

                        <div>
                            <?php
                            if (isset($edit_event)) {
                            ?>
                                <input type="hidden" value="<?php echo $edit_event['e_id'] ?>" name="e_id">
                            <?php
                            }
                            ?>
                            <input class="btn" type="submit" name="<?php if (isset($edit_event)) {
                                                                        echo 'event_update';
                                                                    } else {
                                                                        echo 'event_save';
                                                                    } ?>" value="<?php if (isset($edit_event)) {
                                                                                                                                                                echo 'Update';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'Save';
                                                                                                                                                            } ?>">
                        </div>
                    </div>
                </form>

                <div class="bg-light col ml-lg-5 mt-lg-0 mt-3 event_side_main ">
                    <div class="event_side">
                        <div class="topic_line">
                            <h1 class="font-weight-lighter mt-1">Upcoming Events</h1>
                        </div>

                        <div class="upcoming_events p-2 mt-2">

                            <?php
                            $events = array();

                            $sql = "SELECT * FROM events LIMIT 5";

                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_object($result)) {
                                $events[] = $row;
                            }

                            if (count($events) > 0) {

                                foreach ($events as $event) {

                                    $date = $event->e_date;
                                    $month = date('M', strtotime($date));
                                    $day = date('d', strtotime($date));
                                    $description = $event->e_description;
                            ?>
                                    <a href="php/event-add.php?view_id=<?php echo $event->e_id; ?>" class="text-decoration-none">
                                        <div class=" row upcoming_event mb-2 border-bottom border-dark p-1">
                                            <div class="col-8">
                                                <h1><?php echo $event->e_name ?></h1>
                                                <p> <?php echo implode(' ', array_slice(explode(' ', $description), 0, 3)) ?>...</p>
                                            </div>

                                            <div class="col-3 badge badge-info">
                                                <h1><?php echo $day ?></h1>
                                                <h1><?php echo $month ?></h1>

                                            </div>
                                        </div>
                                    </a>
                                <?php
                                }
                            } else {

                                ?>
                                <div class=" row upcoming_event mb-2 border-bottom border-dark p-1">
                                    <div class="col-8">
                                        <h1>No Upcoming events to show</h1>
                                        <p class="text-muted">No Upcoming events to show </p>
                                    </div>
                                <?php
                            }
                                ?>

                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            include 'support/footer.php';
            ?>

        <?php
    }

    if (isset($_SESSION["event_error"])) {
        unset($_SESSION["event_error"]);
        ?>
            <script type="text/javascript">
                error_popup('The file extension is not jpeg or png ');
            </script>
        <?php
    }
        ?>

        <?php
        if (isset($_SESSION["UPLOAD"])) {
            if ($_SESSION["UPLOAD"] == "success") {
                unset($_SESSION["UPLOAD"]);
        ?>
                <script type="text/javascript">
                    success_popup('Event has been saved');
                </script>
            <?php
            } else if ($_SESSION["UPLOAD"] == "unsuccess") {
                unset($_SESSION["UPLOAD"]);
            ?>
                <script type="text/javascript">
                    error_popup('Event has been not saved');
                </script>
        <?php
            }
        }
        ?>

        <?php

        if (isset($_SESSION["DELETE_ED"])) {
            if ($_SESSION["DELETE_ED"] == "success") {
                unset($_SESSION["DELETE_ED"]);

        ?>
                <script type="text/javascript">
                    success_popup('Event has been deleted');
                </script>
            <?php
            } else if ($_SESSION["DELETE_ED"] == "unsuccess") {

                unset($_SESSION["DELETE_ED"]);
            ?>
                <script type="text/javascript">
                    error_popup('Event has been not deleted');
                </script>
        <?php
            }
        }
        ?>