<?php
/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */

use Includes\Modules\Leads\KmaLeads;
use Includes\Modules\Team\Physicians;
use Includes\Modules\Locations\Locations;
use Includes\Modules\Helpers\MailChimp;

$requestedPhysician = isset($_GET['requested_physician']) ? $_GET['requested_physician'] : null;
$requestedLocation  = isset($_GET['office']) ? $_GET['office'] : null;
if ($_POST['email_address'] != '' && $_POST['b_b5e9771d295b9a44f4aff96a6_a8de836e2a'] == '') {
    $lead = new KmaLeads();
    $lead->handleAppointment($_POST);

    $message = 'Thank you for requesting an appointment with us. A confirmation email containing the details of your request will be sent momentarily.';

    if ($_POST['newsletter_signup']) {
        $mailChimp = new MailChimp();
        $mailChimp->handleSubscriber($_POST['email_address']);
    }
}
?>
<div class="container">
    <div class="intro-text">
        <?= $message != '' ? '<article id="appointment-request-submitted" class="message is-success"><div class="message-body"><p>' . $message . '</p></div>
</article>' : ''; ?>
        <p class="help" style="margin-bottom:1rem;">*You must complete all fields.</p>
    </div>

    <div class="columns">
        <div class="column is-8-widescreen">
            <form method="post">

                <div class="columns is-multiline is-variable is-3">
                    <div class="column is-6-tablet">
                        <div class="field">
                            <label class="label">First Name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="First Name" name="first_name"
                                       value="<?= (isset($_GET['first_name']) ? $_GET['first_name'] : ''); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-tablet">
                        <div class="field">
                            <label class="label">Last Name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Last Name" name="last_name"
                                       value="<?= (isset($_GET['last_name']) ? $_GET['last_name'] : ''); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-tablet">
                        <div class="field">
                            <label class="label">Email Address</label>
                            <div class="control">
                                <input class="input" type="email" placeholder="Email Address" name="email_address"
                                       value="<?= (isset($_GET['email_address']) ? $_GET['email_address'] : ''); ?>"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-tablet">
                        <div class="field">
                            <label class="label">Phone Number</label>
                            <div class="control">
                                <input class="input phone-number-mask" type="phone" placeholder="(###) ###-####"
                                       name="phone_number"
                                       value="<?= (isset($_GET['phone_number']) ? $_GET['phone_number'] : ''); ?>"
                                       required>
                            </div>
                        </div>
                    </div>
<!--                    <div class="column is-8">-->
<!--                        <div class="columns is-multiline is-mobile is-variable is-1">-->
<!--                            <div class="column is-narrow">-->
<!--                                <div class="field">-->
<!--                                    <label class="label">Date of Birth</label>-->
<!--                                    <label class="label sr-only">Month</label>-->
<!--                                    <div class="control">-->
<!--                                        <div class="select is-fullwidth">-->
<!--                                            <select name="dob[month]" required>-->
<!--                                                <option value="">Month</option>-->
<!--                                                --><?php //foreach (getMonths() as $month) { ?>
<!--                                                    <option value="--><?//= $month; ?><!--" --><?//= isset($_GET['dob']['month']) && $_GET['dob']['month'] == $month ? 'selected' : '' ?><!-- >-->
<!--                                                        --><?//= $month; ?>
<!--                                                    </option>-->
<!--                                                --><?php //} ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="column is-narrow">-->
<!--                                <div class="field">-->
<!--                                    <label class="label">&nbsp;</label>-->
<!--                                    <label class="label sr-only">Day</label>-->
<!--                                    <div class="control">-->
<!--                                        <input class="input" type="text" placeholder="DD" name="dob[day]"-->
<!--                                               style="width: 5rem;"-->
<!--                                               value="--><?//= (isset($_GET['dob']['day']) ? $_GET['dob']['day'] : ''); ?><!--"-->
<!--                                               required maxlength="2">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="column is-narrow">-->
<!--                                <div class="field">-->
<!--                                    <label class="label">&nbsp;</label>-->
<!--                                    <label class="label sr-only">Year</label>-->
<!--                                    <div class="control">-->
<!--                                        <input class="input" type="text" placeholder="YYYY" name="dob[year]"-->
<!--                                               style="width: 6rem;"-->
<!--                                               value="--><?//= (isset($_GET['dob']['year']) ? $_GET['dob']['year'] : ''); ?><!--"-->
<!--                                               required maxlength="4">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                    <div class="column is-12">
                        <hr>
                        <h3 class="title is-secondary">Appointment Information</h3>
                    </div>

                    <div class="column is-12">
                        <div class="columns is-multiline">
                            <div class="column is-6-tablet">
                                <label class="label">Desired Date</label>
                                <div class="field flatpickr" id="requested_date">
                                    <date-picker
                                            appendto="requested_date"
                                            icon="fa-calendar"
                                            placeholder="Select a date"
                                            name="requested_date"
                                            :required="true"
                                            :config="{
                                        dateFormat: 'F j, Y',
                                        minDate: 'today',
                                        disable: [
                                            function(date) {
                                                // disable weekends
                                                return (date.getDay() === 0 || date.getDay() === 6);
                                            }
                                        ]
                                    }"
                                    ></date-picker>
                                </div>
                                <p class="help">Office hours are 8:00 am - 5:00 pm, Mon - Fri</p>
                            </div>
                            <div class="column is-6-tablet">
                                <label class="label">Desired Time</label>
                                <div class="field flatpickr" id="requested_time">
                                    <date-picker
                                            icon="fa-clock-o"
                                            placeholder="Select a time"
                                            name="requested_time"
                                            :required="true"
                                            :config="{
                                        enableTime: true,
                                        noCalendar: true,
                                        minuteIncrement: 15,
                                        time_24hr: false,
                                        dateFormat: 'h:i K',
                                        minDate: '8:00',
                                        maxDate: '16:45'
                                    }"
                                    ></date-picker>
                                </div>
                            </div>
                            <div class="column is-6-tablet">
                                <div class="field">
                                    <label class="label">Desired Location</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="requested_location" required>
                                                <option value="">Select a location</option>
                                                <?php $locations = new Locations();
                                                foreach ($locations->getLocations() as $location) { ?>
                                                    <option value="<?php echo str_replace(' Clinic', '',
                                                        $location['name']); ?>" <?php echo $requestedLocation == $location['slug'] ? 'selected' : '' ?> >
                                                        <?php echo $location['name']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6-tablet">
                                <div class="field" style="margin-top:2rem;">
                                    <strong>New / Current Patient</strong>
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio"
                                                   value="new"
                                                   name="new_current" <?= (isset($_GET['new_current']) && $_GET['new_current'] == 'current' ? '' : 'checked'); ?>
                                                   required>
                                            New Patient
                                        </label>
                                        <label class="radio">
                                            <input type="radio"
                                                   value="current"
                                                   name="new_current" <?= (isset($_GET['new_current']) && $_GET['new_current'] == 'current' ? 'checked' : ''); ?>
                                                   required>
                                            Current Patient
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <label class="label">Desired Provider</label>

                                <div class="field">
                                    <div class="control">
                                        <label class="radio hoverable">
                                            <input type="radio" name="requested_physician" value="First Available"
                                            <?php echo (!isset($physician['name']) ? 'checked' : ''); ?>
                                                   required>
                                            First Available
                                            <p class="help">If you do not have a preference</p>
                                        </label>
                                    </div>
                                </div>
                            <?php
                            $physicians = new Physicians();
                            foreach ($physicians->getPhysicians() as $num => $physician) {
                                if ($physician['appointments']) { ?>
                                        <div class="field">
                                            <div class="control">
                                                <label class="radio hoverable">
                                                    <input type="radio" name="requested_physician"
                                                           value="<?php echo $physician['name']; ?>" <?php echo $requestedPhysician == $physician['slug'] ? 'checked' : '' ?>
                                                           required>
                                                    <?php echo $physician['name']; ?>
                                                    <?php echo ($physician['slug'] == 'dr-matthew-a-neumann' ? '<p class="help">Baton Rouge location only</p>' : ''); ?>
                                                </label>
                                            </div>
                                        </div>
                                <?php }
                            } ?>

<!--                    <div class="column is-12">-->
<!--                        <hr>-->
<!--                        <h3 class="title is-secondary">Insurance Information <em>(if applicable)</em></h3>-->
<!--                    </div>-->
<!---->
<!--                    <div class="column is-12-tablet is-4-desktop">-->
<!--                        <div class="field">-->
<!--                            <label class="label">Insurance Company</label>-->
<!--                            <div class="control">-->
<!--                                <div class="select is-fullwidth">-->
<!--                                    <select name="insurance">-->
<!--                                        <option value="">Select a carrier</option>-->
<!--                                        --><?php //foreach (getInsuranceCarriers() as $carrier) { ?>
<!--                                            <option value="--><?//= $carrier; ?><!--" --><?//= isset($_GET['insurance']) && $_GET['insurance'] == $carrier ? 'selected' : '' ?><!-- >-->
<!--                                                --><?//= $carrier; ?>
<!--                                            </option>-->
<!--                                        --><?php //} ?>
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="column is-6-tablet is-4-desktop">-->
<!--                        <div class="field">-->
<!--                            <label class="label">Insurance ID#</label>-->
<!--                            <div class="control">-->
<!--                                <input class="input" type="text" placeholder="" name="insurance_id_number"-->
<!--                                       value="--><?//= (isset($_GET['insurance_id_number']) ? $_GET['insurance_id_number'] : ''); ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="column is-6-tablet is-4-desktop">-->
<!--                        <div class="field">-->
<!--                            <label class="label">Phone Number on Back of Card</label>-->
<!--                            <div class="control">-->
<!--                                <input class="input phone-number-mask" type="phone" placeholder="(###) ###-####"-->
<!--                                       name="insurance_phone_number"-->
<!--                                       value="--><?//= (isset($_GET['insurance_phone_number']) ? $_GET['insurance_phone_number'] : ''); ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="column is-12">-->
<!--                        <hr>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="field">
                    &nbsp;
                    <label class="label">Is there anything else you'd like us to know?</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Type your message here."
                                  name="additional_instructions"></textarea>
                    </div>
                </div>

                <div class="field" style="margin-top:2rem;">
                    <div class="control">
                        <strong>Subscribe to our eNewsletter?</strong>
                        <label class="radio">
                            <input type="radio"
                                   name="newsletter_signup" <?= (isset($_GET['newsletter_signup']) && $_GET['newsletter_signup'] == 'no' ? '' : 'checked'); ?>
                                   required>
                            Yes
                        </label>
                        <label class="radio">
                            <input type="radio"
                                   name="newsletter_signup" <?= (isset($_GET['newsletter_signup']) && $_GET['newsletter_signup'] == 'no' ? 'checked' : ''); ?>
                                   required>
                            No
                        </label>
                    </div>
                </div>

                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_b5e9771d295b9a44f4aff96a6_a8de836e2a" tabindex="-1" value="">
                </div>
                <p>&nbsp;</p>
                <button type="submit" class="button is-primary is-caps is-rounded has-shadow">Submit Appointment Request
                </button>
            </form>
        </div>
    </div>

</div>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<script>
    $(document).ready(function () {
        $('.phone-number-mask').mask('(000) 000-0000');
    });
</script>

