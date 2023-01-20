<style>
    #view {
        font-size: 17px;
        padding-top: 10px;
    }

    b {
        font-weight: 500;
        font-size: 19px;
    }

    textarea::-webkit-scrollbar-track {

        border-radius: 10px;
        background-color: #E9E3D7;
    }

    textarea::-webkit-scrollbar {
        width: 8px;
        height: 12px;
        padding-left: 1px;
        background-color: #fff;
        cursor: context-menu;
    }

    textarea::-webkit-scrollbar-thumb {
        border-radius: 10px;

        background-color: #909090;
    }

    textarea::-webkit-scrollbar-thumb:hover {
        border-radius: 10px;

        background-color: #cccccc;
    }

    .form-element {
        position: relative;
        width: 90%;
        height: 100px;
    }

    .form-element input {
        display: none;
    }

    .form-element label {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        cursor: pointer;
        border: 2px solid #ddd;
        background: #fff;
        box-shadow: 0px 5px 20px 2px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 200ms ease-in-out;
        border-radius: 5px;
    }

    .form-element .icon {
        margin-top: 10px;
        font-size: 30px;
        color: #555;
        transition: all 200ms ease-in-out;
    }

    .form-element .title {
        font-size: 15px;
        color: #555;
        padding: 5px 0px;
        transition: all 200ms ease-in-out;
    }



    .form-element input:checked+label:before {
        opacity: 1;
        transform: scale(1);
    }

    .form-element input:checked+label .icon {
        color: #0d0df1;
    }

    .form-element input:checked+label .title {
        color: #0d0df1;
    }

    .form-element input:checked+label {
        border: 2px solid #0d0df1;
    }

    .label__checkbox {
        display: none;
    }

    .label__check {
        display: inline-block;
        border-radius: 50%;
        border: 2px solid rgba(0, 0, 0, 0.1);

        vertical-align: middle;
        margin-right: 20px;
        width: 1.6rem;
        height: 1.6rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: border 0.3s ease;
    }

    .label__check i.icon {
        opacity: 0.2;
        font-size: calc(0.7rem);
        color: transparent;
        transition: opacity 0.3s 0.1s ease;
        -webkit-text-stroke: 3px rgba(0, 0, 0, 0.5);
    }

    .label__check:hover {
        border: 2px solid rgba(0, 0, 0, 0.2);
    }

    .label__checkbox:checked+.label__text .label__check {
        -webkit-animation: check 0.5s cubic-bezier(0.895, 0.03, 0.685, 0.22) forwards;
        animation: check 0.5s cubic-bezier(0.895, 0.03, 0.685, 0.22) forwards;
    }

    .label__checkbox:checked+.label__text .label__check .icon {
        opacity: 1;
        transform: scale(0);
        color: white;
        -webkit-text-stroke: 0;
        -webkit-animation: icon 0.3s cubic-bezier(1, 0.008, 0.565, 1.65) 0.1s 1 forwards;
        animation: icon 0.3s cubic-bezier(1, 0.008, 0.565, 1.65) 0.1s 1 forwards;
    }
    @-webkit-keyframes icon {
        from {
            opacity: 0;
            transform: scale(0.3);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes icon {
        from {
            opacity: 0;
            transform: scale(0.3);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @-webkit-keyframes check {
        0% {
            width: 1.1rem;
            height: 1.1rem;
            border-width: 5px;
        }

        10% {
            width: 1.1rem;
            height: 1.1rem;
            opacity: 0.1;
            background: rgba(0, 0, 0, 0.2);
            border-width: 15px;
        }

        12% {
            width: 1.1rem;
            height: 1.1rem;
            opacity: 0.4;
            background: rgba(0, 0, 0, 0.1);
            border-width: 0;
        }

        50% {
            width: 1.6rem;
            height: 1.6rem;
            background: #00d478;
            border: 0;
            opacity: 0.6;
        }

        100% {
            width: 1.6rem;
            height: 1.6rem;
            background: #00d478;
            border: 0;
            opacity: 1;
        }
    }

    @keyframes check {
        0% {
            width: 1.1rem;
            height: 1.1rem;
            border-width: 5px;
        }

        10% {
            width: 1.1rem;
            height: 1.1rem;
            opacity: 0.1;
            background: rgba(0, 0, 0, 0.2);
            border-width: 15px;
        }

        12% {
            width: 1.1rem;
            height: 1.1rem;
            opacity: 0.4;
            background: rgba(0, 0, 0, 0.1);
            border-width: 0;
        }

        50% {
            width: 1.6rem;
            height: 1.6rem;
            background: #00d478;
            border: 0;
            opacity: 0.6;
        }

        100% {
            width: 1.6rem;
            height: 1.6rem;
            background: #00d478;
            border: 0;
            opacity: 1;
        }
    }
</style>
<?php

if (isset($_POST["id"])) {
    $xx = $_POST["id"];
    $email = $_POST["email"];
    $jobId = $_POST["jobId"];
    $count = count($xx);
    foreach ($_POST["id"] as $xx) {
        if ($xx == '') {
            $count = $count - 1;
        }
    }

    $output = '';
    $con = mysqli_connect('localhost', 'root', '', 'super');
    $sql1 = "SELECT * FROM dropreason";
    $res1 = mysqli_query($con, $sql1);
    $output .= ' <div class="modal-header">
    <h4 class="modal-title">Drop ' .  $count . ' candidates</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
<form action="views/action/menu.php" method="POST">
    <div class="modal-body"> 
    <input type="hidden" name="jobId" id="jobId" value="' . $jobId . '">
    <input type="hidden" name="email" id="email" value="' . $email . '">
    <input type="hidden" name="count" id="count" value="' . $count . '">';
    foreach ($_POST["id"] as $xx) {
        $output .= '<input type="hidden" name="applyId[]" id="applyId[]" value="' . $xx . '">';
    }
    $output .= '  <h5>Choose your drop reason ...</h5>
        
        <div class="form-group">';
    while ($row1 = mysqli_fetch_array($res1)) {
        $output .= '
        <label class="label">
        <input type="checkbox" class="label__checkbox" name="dropId[]" id="dropId[]" value="' . $row1['dropReason'] . '">
        <span class="label__text">
            <span class="label__check">
                <i class="fa fa-check icon"></i>
            </span>
        </span>
    </label>' . $row1['dropReason'] . '<br>';
    }
    $output .= '</div>
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input type="submit" style="border-radius: 5px;color:#ffffff" class="btn btn-danger" name="dropnaja" value="Drop">
    </div>
</form>';



    echo $output;
}
?>
<script>

</script>