<?php
    use App\Models\Subject;
    use App\Models\Section;
    $user = session('info');
?>
<?php $__env->startSection('content'); ?>
    <?php if($user['type'] == 'student'): ?>
        <?php
            $teacherid = '6380511b08d36';
            $subjects = new Subject();
            $response = $subjects
                ::where('subj_teacherid', $teacherid)
                ->orderBy('subj_id', 'DESC')
                ->get();
        ?>
        <?php echo $__env->make('pages.students.dashboard', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($user['type'] == 'teacher'): ?>
        <?php
            $teacherid = $user['id'];
            $section = new Section();
            $response = $section
                ::where('sec_teacherid', $teacherid)
                ->orderBy('sec_name', 'DESC')
                ->get();
        ?>
        <?php echo $__env->make('pages.ict.dashboard', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm mb-5">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title"></h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block ">
                    <div class="row mt-5">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <a href="/user/student">
                                <div class="card">
                                    <div class="card-inner-group">
                                        <div class="card-inner text-center">
                                            <img src="/student.png" height="100" alt="">
                                            <hr>
                                            <h3>I'm a Student</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="/user/teacher">
                                <div class="card">
                                    <div class="card-inner-group">
                                        <div class="card-inner text-center">
                                            <img src="/teacher.png" height="100" alt="">
                                            <hr>
                                            <h3>I'm a Teacher</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kent/Development/SIS-SENIORHIGHSCHOOL/resources/views/layout/type.blade.php ENDPATH**/ ?>