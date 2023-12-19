<div class="card animated fadeInDown" style="box-shadow: 7px 10px 15px 5px rgba(0,0,0,0.08);">
    <div id="form138">
        <div id="PrintGradeReportFrontPage">
            <div class="row">
                <div class="column" style="width: 50%;">
                    <div style="text-align: center; font-weight: bold;">REPORT ON ATTENDANCE</div>
                    <table
                        style="border: 1px solid #171717; table-layout: fixed; border-collapse: collapse; cellpadding: 0;">
                        <tr>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;"></td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">OCT</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">NOV</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">DEC</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">JAN</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">FEB</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">MAR</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">APR</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">MAY</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">JUN</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">JUL</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">AUG</td>
                            <td style="border: 1px solid; font-weight: bold; text-align: center;">SEPT</td>
                        </tr>
                        <tr>
                            <?php
                                $attendance = [];
                            ?>
                            <td style="border: 1px solid; text-align: center;">no. of<br>school days</td>
                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attndnc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td style="border: 1px solid; font-weight: bold; text-align: center;">
                                    <?php echo e($attndnc['no_school_days']); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td style="border: 1px solid; text-align: center;">no. of <br>school days<br> present</td>
                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attndnc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td style="border: 1px solid; font-weight: bold; text-align: center;">
                                    <?php echo e($attndnc['no_days_present']); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td style="border: 1px solid; text-align: center;">no. of<br>absent</td>
                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attndnc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td style="border: 1px solid; font-weight: bold; text-align: center;">
                                    <?php echo e($attndnc['no_days_absent']); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </table>
                    <br><br>
                    <strong>PARENTS / GUARDIAN'S SIGNATURE</strong>
                    <table style="border-collapse: collapse;">
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <td style="width: 20%; font-weight: bold; text-align: center;">1st Quarter</td>
                            <td style="border-bottom: 1px solid black; font-weight: bold; text-align: center;">&ensp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-align: center;">2nd Quarter</td>
                            <td style="border-bottom: 1px solid black; font-weight: bold; text-align: center;">&ensp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-align: center;">3rd Quarter</td>
                            <td style="border-bottom: 1px solid black; font-weight: bold; text-align: center;">&ensp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-align: center;">4th Quarter</td>
                            <td style="border-bottom: 1px solid black; font-weight: bold; text-align: center;">&ensp;
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="column" style="width: 50%;">
                    <table style="border-collapse: collapse; table-layout: fixed; cellpadding: 0;" border="0">
                        <tr>
                            <td style="width: 25%; text-align: center;">
                                <img src="/logo.png" style="height: 100px; width: 100px; border-radius: 15%;">
                            </td>
                            <td colspan="2" style="text-align: center; width: 50%;">
                                Republic of the Philippines <br>
                                Department of Education <br>
                                Region X <br>
                                Division of Cagayan de Oro City <br>
                                EAST II <br>
                                <strong>PUERTO NATIONAL HIGH SCHOOL
                                    <br>School ID: 315402
                                </strong>
                            </td>
                            <td style="width: 25%; text-align: center;">
                                <img src="/logo.png" style="height: 100px; width: 100px; border-radius: 15%;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">Name:</td>
                            <td colspan="3"
                                style="text-align: center; font-weight: bolder; border-bottom: 1px solid black;">

                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">Age: </td>
                            <td
                                style="width: 50%; text-align: center; font-weight: bolder; border-bottom: 1px solid black;">
                            </td>
                            <td style="width: 50%;">Sex: </td>
                            <td
                                style="width: 50%; text-align: center; font-weight: bolder; border-bottom: 1px solid black;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">Grade: </td>
                            <td
                                style="width: 50%; text-align: center; font-weight: bolder; border-bottom: 1px solid black;">
                            </td>
                            <td style="width: 50%;">Section: </td>
                            <td
                                style="width: 50%; text-align: center; font-weight: bolder; border-bottom: 1px solid black;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">School Year</td>
                            <td
                                style="width: 50%; text-align: center; font-weight: bolder; border-bottom: 1px solid black;">
                            </td>
                            <td style="width: 50%;">LRN</td>
                            <td
                                style="width: 50%; text-align: center; font-weight: bolder; border-bottom: 1px solid black;">
                            </td>
                        </tr>
                    </table>
                    <div style="width: 50%; font-weight: bolder;">
                        Dear Parent: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This
                        report card shows the ability and progress your child has made in the different learning as well
                        as his/her core value. <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The
                        school welcomes you should you desire to know more about your child's progress.
                    </div>
                    <table style="border-collapse: collapse; table-layout: fixed; cellpadding: 0;" border="0">
                        <tr>
                            <td style="width: 50%;"></td>
                            <td
                                style="width: 50%; font-weight: bold; text-align: center; border-bottom: 1px solid black; text-transform: uppercase;">
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; font-weight: bold; text-align: center; border-bottom: 1px solid black; text-transform: uppercase;">
                                marvin anthony a. ramos</td>
                            <td style="width: 50%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 50%; font-weight: bolder; text-align: center; text-transform: uppercase;">
                                principal</td>
                            <td style="width: 50%;"></td>
                        </tr>
                    </table>

                    <div style="width: 50%; font-weight: bold; text-align: center;">
                        Certificate of Transfer
                    </div>
                    <div style="width: 50%;">
                        Admitted to grade <strong
                            style="border-bottom: 1px solid black; font-weight: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                        section <strong
                            style="border-bottom: 1px solid black; font-weight: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                        <br>
                        Eligible for Admission to Grade: <strong
                            style="border-bottom: 1px solid black; font-weight: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                    </div>
                    <table style="border-collapse: collapse; table-layout: fixed; cellpadding: 0;" border="0">
                        <tr>
                            <td style="width: 50%;">Approved:</td>
                            <td style="width: 50%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 50%;"></td>
                            <td
                                style="width: 50%; font-weight: bold; text-align: center; border-bottom: 1px solid black; text-transform: uppercase;">
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; font-weight: bold; text-align: center; border-bottom: 1px solid black; text-transform: uppercase;">
                                marvin anthony a. ramos</td>
                            <td style="width: 50%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 50%; font-weight: bolder; text-align: center; text-transform: uppercase;">
                                principal</td>
                            <td style="width: 50%;"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="PrintGradeReportBackPage">
            <div class="row">
                <div class="column" style="width: 50%; padding: 0px;">
                    <div style="text-align: center; font-weight: bold;">Report on Learning Progress and Achievement
                    </div>
                    <br>
                    <table style="border-collapse: collapse;">
                        <tr>
                            <th style="width: 80%; text-align: left;">Learning Areas</th>
                            <th style="width: 10%;">Quarter</th>
                            <th style="width: 10%;">Final Rating</th>
                        </tr>
                        <?php
                            $subjects = [];
                            $coreValues = [];
                        ?>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($subject['name']); ?></td>
                                <?php for($i = 0; $i < 4; $i++): ?>
                                    <td style="text-align: center;">
                                        <?php if(isset($grades[$i][$subject['id']])): ?>
                                            <?php echo e($grades[$i][$subject['id']]['quarterly_grade']); ?>

                                        <?php endif; ?>
                                    </td>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th colspan="2" style="text-align: left;">School Core Values</th>
                            <th style="text-align: center;">Final Rating</th>
                        </tr>
                        <?php $__currentLoopData = $coreValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coreValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="2"><?php echo e($coreValue['name']); ?></td>
                                <td style="text-align: center;">
                                    <?php if(isset($grades['core_values'][$coreValue['id']])): ?>
                                        <?php echo e($grades['core_values'][$coreValue['id']]); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="column" style="width: 50%;">
                    <div style="text-align: center; font-weight: bold;">General Average</div>
                    <table style="border-collapse: collapse;">
                        <tr>
                            <th style="width: 80%; text-align: left;">Quarter</th>
                            <th style="width: 10%;">General Average</th>
                            <th style="width: 10%;">Remarks</th>
                        </tr>
                        <?php for($i = 0; $i < 4; $i++): ?>
                            <tr>
                                <td>Quarter <?php echo e($i + 1); ?></td>
                                <td style="text-align: center;">
                                    <?php if(isset($generalAverages[$i])): ?>
                                        <?php echo e($generalAverages[$i]['average']); ?>

                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if(isset($generalAverages[$i])): ?>
                                        <?php echo e($generalAverages[$i]['remarks']); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </table>
                    <br>
                    <div style="width: 100%; font-weight: bolder;">
                        <table style="border-collapse: collapse; table-layout: fixed; cellpadding: 0;" border="0">
                            <tr>
                                <td style="width: 50%;">Approved:</td>
                                <td
                                    style="width: 50%; font-weight: bold; text-align: center; border-bottom: 1px solid black; text-transform: uppercase;">
                                  </td>
                            </tr>
                            <tr>
                                <td
                                    style="width: 50%; font-weight: bold; text-align: center; border-bottom: 1px solid black; text-transform: uppercase;">
                                    marvin anthony a. ramos</td>
                                <td style="width: 50%;"></td>
                            </tr>
                            <tr>
                                <td
                                    style="width: 50%; font-weight: bolder; text-align: center; text-transform: uppercase;">
                                    principal</td>
                                <td style="width: 50%;"></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div style="font-weight: bolder;">
                        <strong>THIS FORM 138</strong> is not valid without the <strong>signature of the school
                            principal</strong>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\School Management System\DepEd Senior High School\resources\views/layout/form138.blade.php ENDPATH**/ ?>