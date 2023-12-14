@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <a class="back-to">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Student Attendance</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-1">
                        <table class="table table-bordered" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th style="background-color: #D0CECE;" width="170"></th>
                                    @php
                                        $months = ['Aug', 'Sept', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Aprl', 'May', 'June', 'July'];
                                        $id = 1;
                                    @endphp
                                    @foreach ($months as $month)
                                        <th style="background-color: #D0CECE;">{{ $month }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No. of school days</td>
                                    @foreach ($months as $month)
                                        @php
                                            $year = date('Y');

                                            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($month)), $year);

                                            $weekdayCount = 0;

                                            for ($day = 1; $day <= $daysInMonth; $day++) {
                                                $dateString = sprintf('%04d-%02d-%02d', $year, date('m', strtotime($month)), $day);

                                                if (date('N', strtotime($dateString)) <= 5) {
                                                    $weekdayCount++;
                                                }
                                            }

                                            $days_count = DB::table('t_attendance')
                                                ->where('at_studentid', $id)
                                                ->where('at_month', $month)
                                                ->where('at_type', 'days')
                                                ->first();

                                            $count_days = empty($days_count->at_count) ? '' : $days_count->at_count;
                                        @endphp
                                        <td style="padding: 0;">
                                            <input type="number" placeholder="{{ $weekdayCount }}"
                                                value="{{ $count_days }}" id="days_{{ $month }}"
                                                onkeyup="raw(this.value, '{{ $id }}', 'days', '{{ $month }}')"
                                                class="form-control text-center"
                                                style="border: none; border-bottom: 2px solid #eee;">
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>No. of days present</td>
                                    @foreach ($months as $month)
                                        @php
                                            $present_count = DB::table('t_attendance')
                                                ->where('at_studentid', $id)
                                                ->where('at_month', $month)
                                                ->where('at_type', 'present')
                                                ->first();

                                            $count_present = empty($present_count->at_count) ? '' : $present_count->at_count;
                                        @endphp
                                        <td style="padding: 0;">
                                            <input type="number" value="{{ $count_present }}"
                                                id="present_{{ $month }}"
                                                onkeyup="raw(this.value, '{{ $id }}', 'present', '{{ $month }}')"
                                                placeholder="0" class="form-control text-center"
                                                style="border: none; border-bottom: 2px solid #eee;">
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>No. of days absent</td>
                                    @foreach ($months as $month)
                                        @php
                                            $absent_count = DB::table('t_attendance')
                                                ->where('at_studentid', $id)
                                                ->where('at_month', $month)
                                                ->where('at_type', 'absents')
                                                ->first();

                                            $count_absent = empty($absent_count->at_count) ? '' : $absent_count->at_count;
                                        @endphp
                                        <td style="padding: 0;">
                                            <input type="number" value="{{ $count_absent }}"
                                                id="absents_{{ $month }}"
                                                onkeyup="raw(this.value, '{{ $id }}', 'absents', '{{ $month }}')"
                                                placeholder="0" class="form-control text-center"
                                                style="border: none; border-bottom: 2px solid #eee;">
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-2">
                        <table class="table table-bordered">
                            <tr>
                                <th width="170" style="background-color: #D0CECE;">Core Values</th>
                                <th style="background-color: #D0CECE;">Behavior Statements</th>
                                <th width="100" style="background-color: #D0CECE;">Q1</th>
                                <th width="100" style="background-color: #D0CECE;">Q2</th>
                                <th width="100" style="background-color: #D0CECE;">Q3</th>
                                <th width="100" style="background-color: #D0CECE;">Q4</th>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">1. Maka-Diyos</td>
                                <td>Expresses one's spiritual beliefs while respecting the spiritual beliefs of others.</td>
                                <td>
                                    <select name="" id="raw_1.0_Q1"
                                        onchange="rawValues('1.0', '{{ $id }}', 'Q1', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_1.0_Q2"
                                        onchange="rawValues('1.0', '{{ $id }}', 'Q2', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_1.0_Q3"
                                        onchange="rawValues('1.0', '{{ $id }}', 'Q3', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_1.0_Q4"
                                        onchange="rawValues('1.0', '{{ $id }}', 'Q4', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Shows adherence to ethical principles by upholding truth</td>
                                <td>
                                    <select name="" id="raw_1.1_Q1"
                                        onchange="rawValues('1.1', '{{ $id }}', 'Q1', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_1.1_Q2"
                                        onchange="rawValues('1.1', '{{ $id }}', 'Q2', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_1.1_Q3"
                                        onchange="rawValues('1.1', '{{ $id }}', 'Q3', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_1.1_Q4"
                                        onchange="rawValues('1.1', '{{ $id }}', 'Q4', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 10px;">2. Makatao</td>
                                <td>Is sensitive to individual, social and cultural differences</td>
                                <td>
                                    <select name="" id="raw_2.0_Q1"
                                        onchange="rawValues('2.0', '{{ $id }}', 'Q1', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_2.0_Q2"
                                        onchange="rawValues('2.0', '{{ $id }}', 'Q2', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_2.0_Q3"
                                        onchange="rawValues('2.0', '{{ $id }}', 'Q3', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_2.0_Q4"
                                        onchange="rawValues('2.0', '{{ $id }}', 'Q4', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Demonstrates constributions toward solidarity</td>
                                <td>
                                    <select name="" id="raw_2.1_Q1"
                                        onchange="rawValues('2.1', '{{ $id }}', 'Q1', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_2.1_Q2"
                                        onchange="rawValues('2.1', '{{ $id }}', 'Q2', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_2.1_Q3"
                                        onchange="rawValues('2.1', '{{ $id }}', 'Q3', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_2.1_Q4"
                                        onchange="rawValues('2.1', '{{ $id }}', 'Q4', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">3. Maka-Kalikasan</td>
                                <td>Cares for the environment and utilizes resources wisely, judiciously, and economically
                                </td>
                                <td>
                                    <select name="" id="raw_3.0_Q1"
                                        onchange="rawValues('3.0', '{{ $id }}', 'Q1', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_3.0_Q2"
                                        onchange="rawValues('3.0', '{{ $id }}', 'Q2', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_3.0_Q3"
                                        onchange="rawValues('3.0', '{{ $id }}', 'Q3', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_3.0_Q4"
                                        onchange="rawValues('3.0', '{{ $id }}', 'Q4', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">4. Maka-bansa</td>
                                <td>Demonstrates pride in being a Filipino; exercises the rights and responsibilities of a
                                    Filipino citizen</td>
                                <td>
                                    <select name="" id="raw_4.0_Q1"
                                        onchange="rawValues('4.0', '{{ $id }}', 'Q1', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_4.0_Q2"
                                        onchange="rawValues('4.0', '{{ $id }}', 'Q2', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_4.0_Q3"
                                        onchange="rawValues('4.0', '{{ $id }}', 'Q3', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_4.0_Q4"
                                        onchange="rawValues('4.0', '{{ $id }}', 'Q4', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Demonstrates appropriate behavior in carrying out activities in the school, community,
                                    and country</td>
                                <td>
                                    <select name="" id="raw_4.1_Q1"
                                        onchange="rawValues('4.1', '{{ $id }}', 'Q1', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_4.1_Q2"
                                        onchange="rawValues('4.1', '{{ $id }}', 'Q2', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_4.1_Q3"
                                        onchange="rawValues('4.1', '{{ $id }}', 'Q3', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="raw_4.1_Q4"
                                        onchange="rawValues('4.1','{{ $id }}', 'Q4', this.value)"
                                        class="form-control text-center">
                                        <option value="" disabled selected>--</option>
                                        <option value="AO">AO</option>
                                        <option value="SO">SO</option>
                                        <option value="RO">RO</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <div class="row p-5 pt-3">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">

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
                                        <td style="border: none; padding: 1px; padding-left: 30px;">Fairly Satisfactory
                                        </td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;">75-79</td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;">Passed</td>
                                    </tr>
                                    <tr>
                                        <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;">Did Not Meet
                                            Expectations</td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;">Below 75</td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;"></td>
                                        <td style="border: none; padding: 1px; padding-left: 30px;">Failed</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function raw(count, id, type, month) {
            var avg = 0;
            $.ajax({
                url: '/api/upload/attendance',
                type: 'POST',
                data: {
                    count: count,
                    id: id,
                    type: type,
                    month: month,
                },
                success: function(data) {
                    console.log(data);
                    document.getElementById(type + '_' + month).style.borderColor = 'green';
                },
                error: function(err) {
                    console.log(err);
                    document.getElementById(type + '_' + month).style.borderColor = 'red';
                }
            });
        }

        function rawValues(type, id, quarter, value) {

            $.ajax({
                url: '/api/upload/values',
                type: 'POST',
                data: {
                    id: id,
                    type: type,
                    quarter: quarter,
                    value: value,
                },
                success: function(data) {
                    console.log(data);
                    document.getElementById('raw_' + type + '_' + quarter).style.borderColor = 'green';
                },
                error: function(err) {
                    console.log(err);
                    document.getElementById('raw_' + type + '_' + quarter).style.borderColor = 'red';
                }
            });
        }
    </script>
    @php

        $data_values = ['1.0', '1.1', '2.0', '2.1', '3.0', '4.0', '4.1'];
        $data_quarter = ['Q1', 'Q2', 'Q3', 'Q4'];

    @endphp
    @foreach ($data_values as $value)
        @foreach ($data_quarter as $quarter)
            @php
                $result_count = DB::table('t_values')
                    ->where('val_studentid', $id)
                    ->where('val_quarter', $quarter)
                    ->where('val_type', $value)
                    ->first();
                $count_result = empty($result_count->val_result) ? '' : $result_count->val_result;
            @endphp
            <script>
                document.getElementById('raw_{{ $value }}_{{ $quarter }}').value = '{{$count_result}}';
            </script>
        @endforeach
    @endforeach
@endsection
