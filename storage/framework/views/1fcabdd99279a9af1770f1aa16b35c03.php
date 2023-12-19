<!DOCTYPE html>
<html lang="en">
<?php
    $user = session('info');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }


        .container {
            width: 100%;
            margin: 0 auto;
            display: flex;
        }

        .column {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;

        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }

        /* Style for table cells (td) */
        td {
            border-bottom: 1px solid #000;
            /* Only bottom border */
            padding: 10px;
            padding-bottom: 2px;
            text-align: left;
        }

        /* Style for table header cells (th) */
        th {
            border: 1px solid #202020;
            /* border-bottom: 2px solid #333; */
            /* Header has a slightly thicker bottom border */
            padding: 10px;
            text-align: left;
        }

        @media print {
            /* Apply print-specific styles here */

            /* Add page breaks as needed */
            .page-break {
                page-break-before: always;
            }
        }

        .nested-table {
            border-collapse: collapse;
            width: 100%;
        }

        .nested-table,
        .nested-table th,
        .nested-table td {
            /* //border: 1px solid #ddd; */
        }

        .nested-table th,
        .nested-table td {
            text-align: left;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="container">
        <?php
            $months = ['Aug', 'Sept', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Aprl', 'May', 'June', 'July'];
        ?>
        <div class="column" style="padding-top: 180px;">

            <center><b style="font-size: 12px;">REPORT ON ATTENDANCE</b></center>
            <table style="font-size: 12px;">
                <tr style="border: 1px solid #202020">
                    <th width="50" style="background-color: #D0CECE; padding: 5px;"></th>
                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th style="background-color: #D0CECE; padding: 5px;"><?php echo e($month); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td style="border: 1px solid #202020; padding: 5px; text-align: center; font-size: 11px;">No. of
                        school days</td>
                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $days_count = DB::table('t_attendance')
                                ->where('at_studentid', $id)
                                ->where('at_month', $month)
                                ->where('at_type', 'days')
                                ->first();

                            $count_days = empty($days_count->at_count) ? '' : $days_count->at_count;
                        ?>
                        <td style="border: 1px solid #202020; padding: 5px; text-align: center"><?php echo e($count_days); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td style="border: 1px solid #202020; padding: 5px; text-align: center; font-size: 11px;">No. of
                        days present</td>
                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $present_count = DB::table('t_attendance')
                                ->where('at_studentid', $id)
                                ->where('at_month', $month)
                                ->where('at_type', 'present')
                                ->first();

                            $count_present = empty($present_count->at_count) ? '' : $present_count->at_count;
                        ?>
                        <td style="border: 1px solid #202020; padding: 5px; text-align: center"><?php echo e($count_present); ?>

                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td style="border: 1px solid #202020; padding: 5px; text-align: center; font-size: 11px;">No. of
                        days absent</td>
                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $absent_count = DB::table('t_attendance')
                                ->where('at_studentid', $id)
                                ->where('at_month', $month)
                                ->where('at_type', 'absents')
                                ->first();

                            $count_absent = empty($absent_count->at_count) ? '' : $absent_count->at_count;
                        ?>
                        <td style="border: 1px solid #202020; padding: 5px; text-align: center"><?php echo e($count_absent); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </table>
            <br><br><br><br>
            <b style="font-size: 12px;">PARENT/GUARDIAN'S SIGNATURE</b>
            <table style="margin: 0px; padding: 0px; font-size: 12px;">
                <tbody>
                    <tr>
                        <td width="80" style="border: none;">1st Quarter</td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td width="80" style="border: none;">2nd Quarter</td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td width="80" style="border: none;">3rd Quarter</td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td width="80" style="border: none;">4th Quarter</td>
                        <td colspan="5"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php
            $info = DB::table('t_students')
                ->where('student_id', $id)
                ->first();

            $strand = DB::table('t_sections')
                ->join('t_strands', 't_strands.of_id', 't_sections.sec_strand')
                ->where('sec_id', $info->student_secid)
                ->first();

            $school = DB::table('t_schools')->where('sc_id', $info->student_ict_id)->get();
        ?>
        <div class="column" style="text-align: left; font-size: 14px;">
            <small>DepEd SCHOOL FORM 9</small>
            <center>
                <img src="/deped seal.webp" height="75" style="position: absolute; left: 585px">
                <img src="/<?php echo e($school[0]->sc_logo); ?>" height="75" style="position: absolute; right: 40px">
                <p>
                    Republic of the Philippines <br>
                    <span style="font-size: 16px; font-style: bold;">Department of Education</span> <br>
                    <?php echo e($school[0]->sc_region); ?> <br>
                    DIVISION OF CAGAYAN DE ORO CITY
                    <br><br>
                    <b><?php echo e($school[0]->sc_name); ?></b> <br>
                    <?php echo e($school[0]->sc_address); ?> <br>
                    School ID: <?php echo e($school[0]->sc_id); ?> <br> <b>SENIOR HIGH SCHOOL</b>
                </p>
            </center>
            <table style="margin: 0px; padding: 0px; font-size: 12px;">
                <tbody>
                    <tr>
                        <td width="20" style="border: none;">Name:</td>
                        <td colspan="5">
                            <b style="text-transform: uppercase">
                                <?php echo e($info->student_lname); ?>,
                                <?php echo e($info->student_fname); ?> <?php echo e($info->student_mname); ?>.
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td width="20" style="border: none;">Age:</td>
                        <td colspan="0">
                            <center><b><?php echo e((new DateTime($info->student_birthdate))->diff(new DateTime())->y); ?></b>
                            </center>
                        </td>
                        <td width="50" style="border: none;">Sex:</td>
                        <td colspan="0">
                            <center><b><?php echo e($info->student_gender); ?></b></center>
                        </td>
                        <td width="30" style="border: none;">LRN:</td>
                        <td colspan="0"><b><?php echo e($info->student_lrd); ?></b></td>
                    </tr>
                    <tr>
                        <td width="115" colspan="2" style="border: none;">Grade / Section: </td>
                        <td colspan="2"><b><?php echo e($strand->sec_grade); ?> - <?php echo e($strand->of_code); ?></b></td>
                        <td width="95" style="border: none;">School Year:</td>
                        <td colspan="2">
                            <center><b><?php echo e($strand->sec_schoolyear); ?></b></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <i style="font-size: 14px">Dear Parent:</i>
            <blockquote style="margin-bottom: 0; font-size: 14px">
                <i>
                    This report card shows the ability and progress your child has made
                </i>
            </blockquote>
            <i style="font-size: 14px">in the different learning areas as well as his/her core values.</i>
            <blockquote style="margin-bottom: 0; font-size: 14px; margin-top: 0">
                <i>
                    The school welcomes you should you desire to know more about
                </i>
            </blockquote>
            <i style="font-size: 14px">your child's progress.</i>
            <div class="container" style="margin: 0px; padding: 0px;">
                <div class="column" style="margin: 0px; padding: 0px;">
                    <table style="font-size: 12px">
                        <tbody>
                            <tr>
                                <td>
                                    <center><b><?php echo e($school[0]->sc_principal); ?></b></center>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; padding-top: 0px;">
                                    <center><?php echo e($school[0]->sc_pr_rank); ?></center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column" style="margin: 0px; padding: 0px;">
                    <table style="margin: 0px; padding: 0px; font-size: 12px;">
                        <tbody>
                            <tr>
                                <td>
                                    <center><b style="text-transform: uppercase"><?php echo e($user['name']); ?></b></center>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; padding-top: 0px;">
                                    <center>Teacher</center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <center><b style="font-size: 12px;">Certificate of Transfer</b></center>
            <table style="margin: 0px; padding: 0px; margin-bottom: 5px; font-size: 12px;">
                <tbody>
                    <tr>
                        <td width="150" style="border: none;">Admitted to Grade:</td>
                        <td colspan="2"></td>
                        <td width="50" style="border: none;">Section:</td>
                        <td colspan="5"></td>
                    </tr>
                </tbody>
            </table>
            <table style="margin: 0px; padding: 0px; font-size: 12px;">
                <tbody>
                    <tr>
                        <td width="240" style="border: none;  padding-top: 0px;">Eligibility for Admission to Grade:
                        </td>
                        <td colspan="4" style="padding-top: 0px;"></td>
                    </tr>
                </tbody>
            </table>
            &ensp; <span style="font-size: 12px;">Approved:</span>
            <div class="container" style="margin: 0px; padding: 0px;">
                <div class="column" style="margin: 0px; padding: 0px;">
                    <table style="font-size: 12px;">
                        <tbody>
                            <tr>
                                <td>
                                    <center><b><?php echo e($school[0]->sc_principal); ?></b></center>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; padding-top: 0px;">
                                    <center><?php echo e($school[0]->sc_pr_rank); ?></center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column" style="margin: 0px; padding: 0px;">
                    <table style="margin: 0px; padding: 0px; font-size: 12px;">
                        <tbody>
                            <tr>
                                <td>
                                    <center><b style="text-transform: uppercase"><?php echo e($user['name']); ?></b></center>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; padding-top: 0px;">
                                    <center>Teacher</center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <center><i style="font-size: 12px;">Cancellation of Eligibility to Transfer</i></center>
            <table style="margin: 0px; padding: 0px; margin-bottom: 5px; font-size: 12px;">
                <tbody>
                    <tr>
                        <td width="80" style="border: none;">Admitted in:</td>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
            <table style="margin: 0px; padding: 0px; margin-bottom: 5px; font-size: 12px;">
                <tbody>
                    <tr>
                        <td width="50" style="border: none;">Date in:</td>
                        <td colspan="2"></td>
                        <td width="50" style="border: none;"></td>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
            <span style="position: absolute; right: 90px;">Principal I</span>
        </div>

    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="column" style="padding-top: 20px;">

            <center><b style="font-size: 12px;">REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</b></center>
            <b style="font-size: 12px;">First Semester</b>
            <table style="font-size: 12px; margin-top: 0">
                <tr style="border: 1px solid #202020">
                    <th style="background-color: #D0CECE; padding: 5px; text-align: center;">SUBJECTS
                    </th>
                    <th width="100"
                        style="padding: 0px; background-color: #D0CECE; text-align: center; padding-top: 5px;">
                        <b style="font-size: 14px;">Quarter</b>
                        <table class="nested-table" style="margin: 0; padding: 0; margin-top: 5px;">
                            <tr>
                                <th
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-left: none; border-bottom: none; padding: 5px;">
                                    1</th>
                                <th
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-bottom: none; padding: 5px;">
                                    2</th>
                            </tr>
                        </table>
                    </th>
                    <th width="100" style="padding: 0px; background-color: #D0CECE; text-align: center;">
                        Semester <br> Final Grade
                    </th>
                </tr>
                <tr>
                    <th style="padding: 5px; background-color: #D0CECE; border-right: none;">Core Subjects</th>
                    <th colspan="4" style="padding: 5px; background-color: #D0CECE; border-left: none;"></th>
                </tr>
                <tr>
                    <td style="border: 1px solid #202020; padding: 5px; font-size: 11px; padding: 5px;">
                        Personal Development
                    </td>
                    <td style="padding: 0px;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-left: none; border-bottom: none; border-top: none; padding: 5px;">
                                    1</td>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-bottom: none; border-top: none;  border-right: none; padding: 5px;">
                                    2</td>
                            </tr>
                        </table>
                    </td>
                    <td
                        style="border: 1px solid #202020; padding: 5px; font-size: 12px; padding: 5px; text-align: center;">
                        97</td>
                </tr>
                <tr>
                    <th style="padding: 5px; background-color: #D0CECE; border-right: none;">Applied and Specialized
                        Subjects</th>
                    <th colspan="4" style="padding: 5px; background-color: #D0CECE; border-left: none;"></th>
                </tr>
                <tr>
                    <td style="border: 1px solid #202020; padding: 5px; font-size: 11px; padding: 5px;">
                        Trends, Networks, and Critical Thinking in the 21st Century
                    </td>
                    <td style="padding: 0px;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-left: none; border-bottom: none; border-top: none; padding: 5px;">
                                    1</td>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-bottom: none; border-top: none;  border-right: none; padding: 5px;">
                                    2</td>
                            </tr>
                        </table>
                    </td>
                    <td
                        style="border: 1px solid #202020; padding: 5px; font-size: 12px; padding: 5px; text-align: center;">
                        97</td>
                </tr>
                <tr>
                    <th colspan="2" style="padding: 5px; background-color: #fff; border: none; text-align: right;">
                        General Average for the Semester : </th>
                    <th colspan="4" style="padding: 5px; background-color: #fff; "></th>
                </tr>
            </table>

            <table style="font-size: 12px; margin-top: 0">
                <tr>
                    <th width="90" style="border: none; padding: 5px; font-size: 10px">
                    </th>
                    <td width="210" style=" border: none; padding: 5px; font-size: 10px">
                    </td>
                    <td style="padding: 0px;" width="90">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <th
                                    style="text-align: center; border:none; border-right: none; border-left: none; border-bottom: none; padding: 5px;">
                                    Q1</th>
                                <th style="text-align: center; border: none; border-bottom: none;  padding: 5px;">
                                    Q2</th>
                            </tr>
                        </table>
                    </td>
                    <td style="border-bottom: none; "></td>
                <tr>
                    <th width="90" style=" border: 1px solid #202020; padding: 5px; font-size: 10px">
                        Learning Modality</th>
                    <td width="210" style=" border: 1px solid #202020; padding: 5px; font-size: 10px">
                        Blended Learning (MDL)/ Face-to-face (F-to-F)</td>
                    <td style="padding: 0px;" width="90">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-left: none; border-bottom: none; padding: 5px; border-top: none;">
                                    BL</td>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-bottom: none;  padding: 5px;  border-top: none; ">
                                    BL</td>
                            </tr>
                        </table>
                    </td>
                    <td style="border-bottom: none; "></td>
                </tr>
            </table>


            <b style="font-size: 12px;">Second Semester</b>
            <table style="font-size: 12px; margin-top: 0">
                <tr style="border: 1px solid #202020">
                    <th style="background-color: #D0CECE; padding: 5px; text-align: center;">SUBJECTS
                    </th>
                    <th width="100"
                        style="padding: 0px; background-color: #D0CECE; text-align: center; padding-top: 5px;">
                        <b style="font-size: 14px;">Quarter</b>
                        <table class="nested-table" style="margin: 0; padding: 0; margin-top: 5px;">
                            <tr>
                                <th
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-left: none; border-bottom: none; padding: 5px;">
                                    3</th>
                                <th
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-bottom: none; padding: 5px;">
                                    4</th>
                            </tr>
                        </table>
                    </th>
                    <th width="100" style="padding: 0px; background-color: #D0CECE; text-align: center;">
                        Semester <br> Final Grade
                    </th>
                </tr>
                <tr>
                    <th style="padding: 5px; background-color: #D0CECE; border-right: none;">Core Subjects</th>
                    <th colspan="4" style="padding: 5px; background-color: #D0CECE; border-left: none;"></th>
                </tr>
                <tr>
                    <td style="border: 1px solid #202020; padding: 5px; font-size: 11px; padding: 5px;">
                        Personal Development
                    </td>
                    <td style="padding: 0px;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-left: none; border-bottom: none; border-top: none; padding: 5px;">
                                    1</td>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-bottom: none; border-top: none;  border-right: none; padding: 5px;">
                                    2</td>
                            </tr>
                        </table>
                    </td>
                    <td
                        style="border: 1px solid #202020; padding: 5px; font-size: 12px; padding: 5px; text-align: center;">
                        97</td>
                </tr>
                <tr>
                    <th style="padding: 5px; background-color: #D0CECE; border-right: none;">Applied and Specialized
                        Subjects</th>
                    <th colspan="4" style="padding: 5px; background-color: #D0CECE; border-left: none;"></th>
                </tr>
                <tr>
                    <td style="border: 1px solid #202020; padding: 5px; font-size: 11px; padding: 5px;">
                        Trends, Networks, and Critical Thinking in the 21st Century
                    </td>
                    <td style="padding: 0px;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-left: none; border-bottom: none; border-top: none; padding: 5px;">
                                    3</td>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-bottom: none; border-top: none;  border-right: none; padding: 5px;">
                                    4</td>
                            </tr>
                        </table>
                    </td>
                    <td
                        style="border: 1px solid #202020; padding: 5px; font-size: 12px; padding: 5px; text-align: center;">
                        97</td>
                </tr>
                <tr>
                    <th colspan="2" style="padding: 5px; background-color: #fff; border: none; text-align: right;">
                        General Average for the Semester : </th>
                    <th colspan="4" style="padding: 5px; background-color: #fff; "></th>
                </tr>
            </table>

            <table style="font-size: 12px; margin-top: 0">
                <tr>
                    <th width="90" style="border: none; padding: 5px; font-size: 10px">
                    </th>
                    <td width="210" style=" border: none; padding: 5px; font-size: 10px">
                    </td>
                    <td style="padding: 0px;" width="90">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <th
                                    style="text-align: center; border:none; border-right: none; border-left: none; border-bottom: none; padding: 5px;">
                                    Q3</th>
                                <th style="text-align: center; border: none; border-bottom: none;  padding: 5px;">
                                    Q4</th>
                            </tr>
                        </table>
                    </td>
                    <td style="border-bottom: none; "></td>
                <tr>
                    <th width="90" style=" border: 1px solid #202020; padding: 5px; font-size: 10px">
                        Learning Modality</th>
                    <td width="210" style=" border: 1px solid #202020; padding: 5px; font-size: 10px">
                        Blended Learning (MDL)/ Face-to-face (F-to-F)</td>
                    <td style="padding: 0px;" width="90">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-right: none; border-left: none; border-bottom: none; padding: 5px; border-top: none;">
                                    BL</td>
                                <td
                                    style="text-align: center; border: 1px solid #202020; border-bottom: none;  padding: 5px;  border-top: none; ">
                                    BL</td>
                            </tr>
                        </table>
                    </td>
                    <td style="border-bottom: none; "></td>
                </tr>
            </table>
        </div>
        <div class="column" style="padding-top: 20px; font-size: 12px;">
            <center><b style="font-size: 12px;">REPORT ON LEARNER'S OBSERVED VALUES</b></center>
            <br>
            <table style="font-size: 12px; margin-top: 0;  font-size: 12px;">
                <tr style="border: 1px solid #202020">
                    <th width="120" style="background-color: #D0CECE; padding: 5px; text-align: center;">
                        Core Values
                    </th>
                    <th style="background-color: #D0CECE; padding: 5px; text-align: center;">
                        Behavior Statements
                    </th>
                    <th width="200" colspan="4"
                        style="padding: 0px; background-color: #D0CECE; text-align: center; padding-top: 5px;">
                        <b style="font-size: 14px;">QUARTER</b>
                        <table class="nested-table" style="margin: 0; padding: 0; margin-top: 5px;  font-size: 12px;">
                            <tr>
                                <th
                                    style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; padding: 5px;">
                                    1
                                </th>
                                <th
                                    style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; padding: 5px;">
                                    2
                                </th>
                                <th
                                    style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; padding: 5px;">
                                    3
                                </th>
                                <th
                                    style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; padding: 5px;">
                                    4
                                </th>
                            </tr>
                        </table>
                    </th>
                </tr>
                <tr style="border: 1px solid #202020">
                    <td style="background-color: #fff; border: 1px solid #202020">
                        1. Maka-Diyos
                    </td>
                    <td style="background-color: #fff; padding: 0px;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0; font-size: 11px;">
                                        <tr>
                                            <td
                                                style="border: 1px solid #202020; background-color: #fff; border-left: none; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                Expresses one's spiritual beliefs while respecting the spiritual beliefs
                                                of others.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; border-bottom: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0;font-size: 11px;">
                                        <tr>
                                            <td
                                                style="border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none; padding: 5px;">
                                                Shows adherence to ethical principles by upholding truth
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <th width="200" style="padding: 0px; background-color: #fff; text-align: center;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0px; padding-top: 13px;">
                                    <table class="nested-table" style="margin: 0; padding: 0;">
                                        <tr>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_1.0_Q1"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_1.0_Q2"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_1.0_Q3"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_1.0_Q4"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0; border-bottom: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0;">
                                        <tr>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_1.1_Q1"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_1.1_Q2"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_1.1_Q3"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_1.1_Q4"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </th>
                </tr>
                <tr style="border: 1px solid #202020">
                    <td style="background-color: #fff;  border: 1px solid #202020">
                        2. Makatao
                    </td>
                    <td style="background-color: #fff; padding: 0px;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0; font-size: 11px;">
                                        <tr>
                                            <td
                                                style="border: 1px solid #202020; background-color: #fff; border-left: none; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                Is sensitive to individual, social and cultural differences
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; border-bottom: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0;font-size: 11px;">
                                        <tr>
                                            <td
                                                style="border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none; padding: 5px;">
                                                Demonstrates constributions toward solidarity
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <th width="200" style="padding: 0px; background-color: #fff; text-align: center;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0px; ">
                                    <table class="nested-table" style="margin: 0; padding: 0;">
                                        <tr>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_2.0_Q1"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_2.0_Q2"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_2.0_Q3"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_2.0_Q4"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0; border-bottom: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0;">
                                        <tr>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_2.1_Q1"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_2.1_Q2"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_2.1_Q3"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_2.1_Q4"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </th>
                </tr>
                <tr style="border: 1px solid #202020">
                    <td style="background-color: #fff;  border: 1px solid #202020">
                        3. Maka-Kalikasan
                    </td>
                    <td style="background-color: #fff; padding: 0px;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0px; border-bottom: none;">
                                    <table class="nested-table" style="margin: 0; padding: 0; font-size: 11px;">
                                        <tr>
                                            <td
                                                style="border: 1px solid #202020; background-color: #fff; border-left: none; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                Cares for the environment and utilizes resources wisely, judiciously,
                                                and economically
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <th width="200" style="padding: 0px; background-color: #fff; text-align: center;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0px;  border-bottom: none;">
                                    <table class="nested-table" style="margin: 0; padding: 0;">
                                        <tr>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_3.0_Q1"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_3.0_Q2"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_3.0_Q3"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_3.0_Q4"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </th>
                </tr>
                <tr style="border: 1px solid #202020">
                    <td style="background-color: #fff; border: 1px solid #202020">
                        4. Maka-bansa
                    </td>
                    <td style="background-color: #fff; padding: 0px;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0; font-size: 11px;">
                                        <tr>
                                            <td
                                                style="border: 1px solid #202020; background-color: #fff; border-left: none; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                Demonstrates pride in being a Filipino; exercises the rights and
                                                responsibilities of a Filipino citizen
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; border-bottom: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0;font-size: 11px;">
                                        <tr>
                                            <td
                                                style="border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none; padding: 5px;">
                                                Demonstrates appropriate behavior in carrying out activities in the
                                                school, community, and country
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <th width="200" style="padding: 0px; background-color: #fff; text-align: center;">
                        <table class="nested-table" style="margin: 0; padding: 0;">
                            <tr>
                                <td style="padding: 0px; ">
                                    <table class="nested-table" style="margin: 0; padding: 0;">
                                        <tr>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_4.0_Q1"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_4.0_Q2"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_4.0_Q3"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_4.0_Q4"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0; border-bottom: 0px;">
                                    <table class="nested-table" style="margin: 0; padding: 0;">
                                        <tr>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-left: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_4.1_Q1"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_4.1_Q2"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_4.1_Q3"></span>
                                            </td>
                                            <td
                                                style="text-align: center; border: 1px solid #202020; background-color: #fff; border-right: none; border-bottom: none; border-top: none;  padding: 5px;">
                                                <span id="raw_4.1_Q4">x</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
            <?php

                $data_values = ['1.0', '1.1', '2.0', '2.1', '3.0', '4.0', '4.1'];
                $data_quarter = ['Q1', 'Q2', 'Q3', 'Q4'];

            ?>
            <?php $__currentLoopData = $data_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $data_quarter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quarter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $result_count = DB::table('t_values')
                            ->where('val_studentid', $id)
                            ->where('val_quarter', $quarter)
                            ->where('val_type', $value)
                            ->first();
                        $count_result = empty($result_count->val_result) ? 'N/a' : $result_count->val_result;
                    ?>
                    <script>
                        document.getElementById('raw_<?php echo e($value); ?>_<?php echo e($quarter); ?>').innerHTML = '<?php echo e($count_result); ?>';
                    </script>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <table style="border: none;">
                <tr>
                    <th colspan="4" style="border: none;">Observed Values</th>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <th style="border: none;">Marking</th>
                    <td style="border: none;"></td>
                    <th style="border: none;">Non-numerical Rating</th>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">AO</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Always Observed</td>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">SO</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Sometimes Observed</td>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">RO</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Rarely Observed</td>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">NO</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Not Observed</td>
                </tr>
            </table>
            <table style="border: none;">
                <tr>
                    <th colspan="6" style="border: none;">Learner Progress and Achievement</th>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <th style="border: none;">Description</th>
                    <td style="border: none;"></td>
                    <th style="border: none;">Grading Scale</th>
                    <td style="border: none;"></td>
                    <th style="border: none;">Remarks</th>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Outstanding</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">90-100</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Passed</td>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Very Satisfactory</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">85-89</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Passed</td>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Satisfactory</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">80-84</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Passed</td>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Fairly Satisfactory</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">75-79</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Passed</td>
                </tr>
                <tr>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Did Not Meet Expectations</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Below 75</td>
                    <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                    <td style="border: none; padding: 1px; padding-left: 30px;">Failed</td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>
<?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\activity-web-sis-shs\resources\views/print/form9.blade.php ENDPATH**/ ?>