<div class="appointment-box-container has-text-centered">
    <p class="title is-3 is-bold is-primary">Put back pain behind you.</p>
    <p>When you’re pain free, everything gets better.</p>
    <p>Start by requesting an appointment at The Spine Center:</p>
    <form action="/patient-center/appointments/" method="get">
        <div class="columns is-justified is-multiline">
            <div class="column is-6">
                <input class="input" name="first_name" placeholder="First name" required>
            </div>
            <div class="column is-6">
                <input class="input" name="last_name" placeholder="Last name" required>
            </div>
            <div class="column is-6">
                <input class="input" name="phone_number" placeholder="Phone number" required>
            </div>
            <div class="column is-6">
                <input class="input" name="email_address" placeholder="Email address">
            </div>
            <div class="column is-6">
                <div class="select is-fullwidth">
                    <select name="insurance" >
                        <option value="">Insurance <em>(if applicable)</em></option>
                        <?php foreach(getInsuranceCarriers() as $carrier){ ?>
                            <option value="<?= $carrier; ?>" <?= isset($_GET['insurance']) && $_GET['insurance'] == $carrier ? 'selected' : '' ?> >
                                <?= $carrier; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="column is-12">
                <div class="control">
                    Would you like to receive our eNewsletter?
                    <label class="radio">
                        <input type="radio" name="newsletter_signup" value="yes">
                        Yes
                    </label>
                    <label class="radio">
                        <input type="radio" name="newsletter_signup" value="no">
                        No
                    </label>
                </div>
            </div>
            <div class="column is-6">
                <button class="button is-primary is-rounded is-block has-shadow is-caps">Continue with request</button>
            </div>
        </div>
    </form>
</div>
