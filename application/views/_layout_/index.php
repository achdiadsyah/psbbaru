<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> - PSB Ruhul Islam Anak Bangsa</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
</head>
    <body>
        <div id="app">
            <div id="main" class="layout-horizontal">
                <?php $this->view('_layout_/header'); ?>
                <div class="content-wrapper container">
                    <div class="page-heading">
                        <h3><?= $title; ?></h3>
                    </div>
                    <div class="page-content">
                    <?php
                        if (!empty($content)) {
                            $this->view($content);
                        } else {
                            echo "Nothing To Display";
                        }
                    ?>
                    </div>
                </div>
                <?php $this->view('_layout_/footer'); ?>
            </div>
        </div>

        <?php $this->view('_layout_/script'); ?>
        
        <?php
            if ($this->session->flashdata('msg') !== NULL){
                swalalert($this->session->flashdata('msg'), $this->session->flashdata('type'));
            }
        ?>

        <?php
            if (!empty($costum_js)) {
                $this->view($costum_js);
            }
        ?>
        
    </body>
</html>

