<style type="text/css">
    <!--
    table.page_header {
        width: 100%;
        border: none;
        background-color: #DDDDFF;
        border-bottom: solid 1mm #AAAADD;
        padding: 2mm
    }

    table.page_footer {
        width: 100%;
        border: none;
        background-color: #DDDDFF;
        border-top: solid 1mm #AAAADD;
        padding: 2mm
    }

    div.note {
        border: solid 1mm #DDDDDD;
        background-color: #EEEEEE;
        padding: 2mm;
        border-radius: 2mm;
        width: 100%;
    }

    h1 {
        text-align: center;
        font-size: 20mm
    }

    h3 {
        text-align: center;
        font-size: 14mm
    }

    .position div {
    }

    .skills li {
        padding-bottom: 2px;
    }

</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width: 50%; text-align: left">
                    Linkedin Application
                </td>
                <td style="width: 50%; text-align: right">
                    <?php echo date('Y-m-d'); ?>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                </td>
                <td style="width: 67%; text-align: right">
                    page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
    <table style="width: 100%">
        <tr>
            <td style="width: 60%;">
                Name: <?php echo $formattedName; ?>
            </td>
            <td style="width: 40%; text-decoration: underline">
                Total experience:
                <?php
                $months = \Soroush\Linkedin\Entity\Position::$totalExperienceInMonths;
                $year = intval($months / 12);
                $month = $months % 12;
                echo $year . ' year and ' . $month . ' month';
                ?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 50%; text-align: left">
                E-mail: <?php echo $email->emailAddress; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%; text-align: left">
                <?php
                foreach ($contact->phoneNumbers as $number) {
                    ?> <?php echo ucfirst($number->phoneType) ?> : <?php echo $number->phoneNumber; ?>
                <?php }
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left">
                Location : <?php echo $location; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left">
                Headline: <?php echo $headline; ?>
            </td>
        </tr>
    </table>
    <hr>
    <h4 style="margin-bottom:0mm; padding-bottom:0mm;">Skills</h4>
    <table style="width: 100%">
        <tr style="vertical-align: top">
            <?php
            $lists = array_chunk($skills, 15);
            foreach ($lists as $skill) { ?>
                <td style="width: 25%">
                    <?php
                    echo '<div><ul >';
                    echo '<li>' . implode('</li><li>', $skill) . '</li>';
                    echo '</ul> </div>'; ?>
                </td>
            <?php
            }
            ?>
        </tr>
    </table>
    <hr>
    <h4 style="margin-bottom: 2mm; padding-bottom:2mm;">Summary</h4>

    <div>
        <?php echo $summary; ?>
    </div>
    <hr>
    <h4 style="margin-bottom: 3mm; padding-bottom:3mm;">Employment History (Total
        experience: <?php echo $year . ' year and ' . $month . ' month'; ?> )</h4>
    <br>
    <?php foreach ($positions as $position) { ?>
        <div style=" border-bottom: 1px solid #DDDDDD; margin-bottom: 5mm; padding-bottom: 3mm; display: block;">
            <div><label style="font-weight: bold;">Title: </label><?php echo $position->title; ?>
            </div>
            <div><label style="font-weight: bold;">Company: </label><?php echo $position->company->name; ?></div>
            <div><label style="font-weight: bold;">From:</label> <?php echo $position->startDate ?>
                <?php if ($position->isCurrent) { ?>
                    to Present
                <?php } ?>
                <?php if ($position->isCurrent == false) { ?>
                    to <?php echo $position->endDate; ?>
                <?php } ?>
                (<?php echo $position->durationOfEmployment; ?>)
            </div>
            <?php if (isset($position->summary)) { ?>
                <div><label style="font-weight: bold;">Description: </label><?php echo $position->summary; ?></div>
            <?php } ?>
        </div>
    <?php }
    ?>
</page>
