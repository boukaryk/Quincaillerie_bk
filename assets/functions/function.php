<?php
function alert(string $type, string $description, string $animation = "slideInRight"):void
    {
        $alert_code = "<div class='alert ";
        $icone = "fas ";
        switch ($type) 
        {
            case 'success':
                $alert_code .= "alert-success";
                $icone .= "fa-check";
                break;
            case 'danger':
                $alert_code .= "alert-danger";
                $icone .= "fa-bell";
                break;
            case 'warning':
                $alert_code .= "alert-warning";
                $icone .= "fa-exclamation-triangle";
                break;
            case 'primary':
                $alert_code .= "alert-primary";
                $icone .= "fa-exclamation";
                break;
            default:
                $alert_code .= "alert-info";
                $icone .= "fa-exclamation-circle";
                break;
        }

        $alert_code .= " alert-dismissible fixed-top mt-2 ml-auto w-25 show wow ".$animation ." ' role='alert'>
                        <div class='row align-items-center'>
                            <div class='col-auto'>
                                <span class='fa-2x $icone'></span>
                            </div>
                            <div class='col'>
                                <h6 class='text-capitalize'>$type</h6>
                                <p> $description </p>
                            </div>

                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                <span class='sr-only'>Close</span>
                            </button>
                        </div>
                    </div>";
          echo $alert_code;

	}
?>