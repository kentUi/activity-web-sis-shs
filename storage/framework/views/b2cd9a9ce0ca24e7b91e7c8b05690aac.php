<?php
    use App\Models\Subject;
    use App\Models\Section;
    use App\Models\Student;
    use App\Models\Teacher;
    use App\Models\Assigned;
    $user = session('info');
?>
<?php $__env->startSection('content'); ?>
    <?php if($user['type'] == 'student'): ?>
        <?php
            $email = $user['email'];
            $students = new Student();
            $stud = $students::where('student_email', $email)->first();

            $section = new Section();
            $sections = $section::where('sec_id', $stud->student_secid)->first();

            $subjs = new Subject();
            $response = $subjs
                ::where('subj_strand', $sections->sec_strand)
                ->orderBy('subj_title', 'ASC')
                ->get();

            $teacher = new Teacher();
            $adviser = $teacher
                ::join('t_assign', function ($join) {
                    $join->on('ass_teacherid', '=', 'tech_id');
                })
                ->where('ass_secid', $stud->student_secid)
                ->orderBy('tech_lname', 'ASC')
                ->first();
        ?>
        <?php echo $__env->make('pages.students.dashboard', [
            'response' => $response,
            'sectionid' => $stud->student_secid,
            'studentid' => $stud->student_id,
            'sectionName' => $sections->sec_name,
            'sectionGrade' => $sections->sec_grade,
            'adviser' => $adviser,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($user['type'] == 'ICT'): ?>
        <?php
            $teacherid = $user['id'];
            $section = new Section();
            $response = $section
                ::where('sec_strand', 33)
                ->orderBy('sec_name', 'DESC')
                ->get();
        ?>
        <?php echo $__env->make('pages.ict.dashboard', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($user['type'] == 'admin'): ?>
        <?php
            $teacherid = $user['id'];
            $section = new Section();
            $response = $section
                ::where('sec_strand', 33)
                ->orderBy('sec_name', 'DESC')
                ->get();
        ?>
        <?php echo $__env->make('pages.ict.dashboard', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($user['type'] == 'teacher'): ?>
        <?php
            $teacher_fk = $user['email'];
            $section = new Assigned();
            $response = $section
                ::join('t_sections', 'sec_id', 'ass_secid')
                ->join('t_teachers', 'tech_id', 'ass_teacherid')
                ->where('ass_subjid', '<>', null)
                ->where('tech_email', $teacher_fk)
                ->select('sec_name', 'sec_id', 'sec_grade', 'sec_schoolyear')
                ->distinct()
                ->orderBy('sec_name', 'DESC')
                ->get();
        ?>
        <?php echo $__env->make('pages.teachers.dashboard', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shs_sis_laravel_html\resources\views/layout/type.blade.php ENDPATH**/ ?>