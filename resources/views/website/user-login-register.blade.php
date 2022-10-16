@extends('website.layout.app')
@section('title')
    Login | Register
@endsection
@section('content')
    <main role="main" id="loginregiPage" style="padding: 30px;">
        <div id="container" class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="\global_assets\images\card-banners\card2.png" alt="" /></div>
                <div class="formBx">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>Sign In</h2>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="{{ __('E-mail') }}">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-liq-main">{{ __('Sign In') }}<i
                                    class="icon-circle-right2 ml-2"></i></button>
                        </div>

                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <p class="signup">
                            Don't have an account ?
                            <a href="#" onclick="toggleForm();">Sign Up.</a>
                        </p>
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <!-- Progress Form -->
                    <form id="progress-form" class="p-4 progress-form" method="POST"
                        action="{{ route('login-register.register') }}" lang="en" novalidate>
                        @csrf
                        <h2>Create an account</h2>
                        <!-- Step Navigation -->
                        <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
                            <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="true">
                                <span class="d-block step" aria-hidden="true">Step 1 <span class="sm:d-none">of
                                        3</span></span>
                                Personal details
                            </button>
                            <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 2 <span class="sm:d-none">of
                                        3</span></span>
                                Residential details
                            </button>
                            <button id="progress-form__tab-3" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                                type="button" role="tab" aria-controls="progress-form__panel-3" aria-selected="false"
                                tabindex="-1" aria-disabled="true">
                                <span class="d-block step" aria-hidden="true">Step 3 <span class="sm:d-none">of
                                        3</span></span>
                                Bank info
                            </button>
                        </div>
                        <!-- / End Step Navigation -->

                        <!-- Step 1 -->
                        <section id="progress-form__panel-1" role="tabpanel" aria-labelledby="progress-form__tab-1"
                            tabindex="0">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="first_name" type="text"
                                        class="form-group-input form-control @error('first_name') is-invalid @enderror"
                                        name="first_name" value="{{ old('first_name') }}"
                                        placeholder="{{ __('First Name') }}" required autocomplete="first_name" autofocus>
                                </div>
                                <div class="col-sm-6">
                                    <input id="last_name" type="text"
                                        class="form-group-input form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" value="{{ old('last_name') }}"
                                        placeholder="{{ __('Last Name') }}" required autocomplete="last_name" autofocus>
                                </div>
                            </div>

                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="{{ __('E-mail') }}" required
                                autocomplete="email">

                            <input id="phone" type="phone"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" placeholder="{{ __('Contact Number') }}" required
                                autocomplete="phone">

                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                                name="dob" value="{{ old('dob') }}" placeholder="{{ __('Date of Birth') }}"
                                required autocomplete="dob">


                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="password" type="password"
                                        class="form-group-input form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('Password') }}" name="password" required
                                        autocomplete="new-password">
                                </div>
                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" class="form-group-input form-control"
                                        name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-center sm:justify-end sm:mt-5 row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-liq-main" data-action="next">
                                        Continue
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <p class="signup">
                                        Already have an account ?
                                        <a href="#" onclick="toggleForm();">Sign In.</a>
                                    </p>
                                </div>
                            </div>
                        </section>
                        <!-- / End Step 1 -->

                        <!-- Step 2 -->
                        <section id="progress-form__panel-2" role="tabpanel" aria-labelledby="progress-form__tab-2"
                            tabindex="0" hidden>

                            <input id="address" type="text"
                                class="form-control @error('address') is-invalid @enderror" name="address"
                                value="{{ old('address') }}" placeholder="{{ __('Address') }}" required
                                autocomplete="address">
                            <input id="address2" type="text"
                                class="form-control @error('address2') is-invalid @enderror" name="address2"
                                value="{{ old('address2') }}" placeholder="{{ __('City/State') }}" required
                                autocomplete="address2">

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="address3" type="text"
                                        class="form-group-input form-control @error('address3') is-invalid @enderror"
                                        name="address3" value="{{ old('address3') }}" placeholder="{{ __('Contry') }}"
                                        required autocomplete="address3">

                                </div>
                                <div class="col-sm-6">
                                    <input id="address4" type="text"
                                        class="form-group-input form-control @error('address4') is-invalid @enderror"
                                        name="address4" value="{{ old('address4') }}" placeholder="{{ __('Code') }}"
                                        required autocomplete="address4">

                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-center sm:justify-end sm:mt-5 row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-liq-main" data-action="next">
                                        Continue
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <p class="signup">
                                        Already have an account ?
                                        <a href="#" onclick="toggleForm();">Sign In.</a>
                                    </p>
                                </div>
                            </div>
                        </section>
                        <!-- / End Step 2 -->

                        <!-- Step 3 -->
                        <section id="progress-form__panel-3" role="tabpanel" aria-labelledby="progress-form__tab-3"
                            tabindex="0" hidden>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input id="bank-name" type="text"
                                        class="form-group-input form-control @error('bank-name') is-invalid @enderror"
                                        name="bank-name" value="{{ old('bank-name') }}"
                                        placeholder="{{ __('Bank Name') }}" required autocomplete="bank-name">

                                </div>
                                <div class="col-sm-6">
                                    <input id="bank-code" type="text"
                                        class="form-group-input form-control @error('bank-code') is-invalid @enderror"
                                        name="bank-code" value="{{ old('bank-code') }}"
                                        placeholder="{{ __('Code') }}" required autocomplete="bank-code">

                                </div>
                            </div>

                            <input id="bank-account-name" type="text"
                                class="form-control @error('bank-account-name') is-invalid @enderror"
                                name="bank-account-name" value="{{ old('bank-account-name') }}"
                                placeholder="{{ __('Bank Account Name') }}" required autocomplete="bank-account-name">
                            <input id="bank-account-number" type="text"
                                class="form-control @error('bank-account-number') is-invalid @enderror"
                                name="bank-account-number" value="{{ old('bank-account-number') }}"
                                placeholder="{{ __('Bank Account Number') }}" required autocomplete="bank-account-number">

                            <div class="row">
                                <div class="col-sm-6">
                                  <button type="button" class="mt-1 sm:mt-0 button--simple btn btn-liq-main" data-action="prev">
                                    Back
                                  </button>
                                </div>
                                <div class="col-sm-6">
                                  <button class="btn btn-liq-main" type="submit">Sign Up</button>
                                  <p class="signup">
                                    Already have an account ?
                                    <a href="#" onclick="toggleForm();">Sign In.</a>
                                   </p>
                                </div>
                                
                            </div>
                            
                        </section>
                        <!-- / End Step 3 -->

                    </form>
                    <!-- / End Progress Form -->
                </div>
                <div class="imgBx"><img src="\global_assets\images\card-banners\card1.png" alt="" /></div>
            </div>
        </div>
    </main>

    <script>
        function toggleForm() {
            if (!$('#container').hasClass('active_44')) {
                console.log(true);
                $('#container').addClass('active_44');
            } else {
                console.log(false);
                $('#container').removeClass('active_44');
            }
        };


        console.clear();

        function ready(fn) {
            if (document.readyState === 'complete' || document.readyState === 'interactive') {
                setTimeout(fn, 1);
                document.removeEventListener('DOMContentLoaded', fn);
            } else {
                document.addEventListener('DOMContentLoaded', fn);
            }
        }

        ready(function() {

            // Global Constants

            const progressForm = document.getElementById('progress-form');

            const tabItems = progressForm.querySelectorAll('[role="tab"]'),
                tabPanels = progressForm.querySelectorAll('[role="tabpanel"]');

            let currentStep = 0;

            // Form Validation

            /*****************************************************************************
             * Expects a string.
             *
             * Returns a boolean if the provided value *reasonably* matches the pattern
             * of a US phone number. Optional extension number.
             */

            const isValidPhone = val => {
                const regex = new RegExp(/^[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?$/);

                return regex.test(val);
            };

            /*****************************************************************************
             * Expects a string.
             *
             * Returns a boolean if the provided value *reasonably* matches the pattern
             * of a real email address.
             *
             * NOTE: There is no such thing as a perfect regular expression for email
             *       addresses; further, the validity of an email address cannot be
             *       verified on the front end. This is the closest we can get without
             *       our own service or a service provided by a third party.
             *
             * RFC 5322 Official Standard: https://emailregex.com/
             */

            const isValidEmail = val => {
                const regex = new RegExp(
                    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );

                return regex.test(val);
            };

            /*****************************************************************************
             * Expects a Node (input[type="text"] or textarea).
             */

            const validateText = field => {
                const val = field.value.trim();

                if (val === '' && field.required) {
                    return {
                        isValid: false
                    };

                } else {
                    return {
                        isValid: true
                    };

                }
            };

            /*****************************************************************************
             * Expects a Node (select).
             */

            const validateSelect = field => {
                const val = field.value.trim();

                if (val === '' && field.required) {
                    return {
                        isValid: false,
                        message: 'Please select an option from the dropdown menu.'
                    };

                } else {
                    return {
                        isValid: true
                    };

                }
            };

            /*****************************************************************************
             * Expects a Node (fieldset).
             */

            const validateGroup = fieldset => {
                const choices = fieldset.querySelectorAll('input[type="radio"], input[type="checkbox"]');

                let isRequired = false,
                    isChecked = false;

                for (const choice of choices) {
                    if (choice.required) {
                        isRequired = true;
                    }

                    if (choice.checked) {
                        isChecked = true;
                    }
                }

                if (!isChecked && isRequired) {
                    return {
                        isValid: false,
                        message: 'Please make a selection.'
                    };

                } else {
                    return {
                        isValid: true
                    };

                }
            };

            /*****************************************************************************
             * Expects a Node (input[type="radio"] or input[type="checkbox"]).
             */

            const validateChoice = field => {
                return validateGroup(field.closest('fieldset'));
            };

            /*****************************************************************************
             * Expects a Node (input[type="tel"]).
             */

            const validatePhone = field => {
                const val = field.value.trim();

                if (val === '' && field.required) {
                    return {
                        isValid: false
                    };

                } else if (val !== '' && !isValidPhone(val)) {
                    return {
                        isValid: false,
                        message: 'Please provide a valid US phone number.'
                    };

                } else {
                    return {
                        isValid: true
                    };

                }
            };

            /*****************************************************************************
             * Expects a Node (input[type="email"]).
             */

            const validateEmail = field => {
                const val = field.value.trim();

                if (val === '' && field.required) {
                    return {
                        isValid: false
                    };

                } else if (val !== '' && !isValidEmail(val)) {
                    return {
                        isValid: false,
                        message: 'Please provide a valid email address.'
                    };

                } else {
                    return {
                        isValid: true
                    };

                }
            };


            const validateDate = field => {
                const val = field.value.trim();
                if (val === '' && field.required) {
                    return {
                        isValid: false
                    };

                } else {
                    return {
                        isValid: true
                    };

                }
            }


            const validatePassword = field => {
                const val = field.value.trim();
                if (val === '' && field.required) {
                    return {
                        isValid: false
                    };

                } else {
                    return {
                        isValid: true
                    };

                }
            }

            /*****************************************************************************
             * Expects a Node (field or fieldset).
             *
             * Returns an object describing the field's overall validity, as well as
             * a possible error message where additional information may be helpful for
             * the user to complete the field.
             */

            const getValidationData = field => {
                switch (field.type) {
                    case 'text':
                    case 'textarea':
                        return validateText(field);
                    case 'select-one':
                        return validateSelect(field);
                    case 'fieldset':
                        return validateGroup(field);
                    case 'radio':
                    case 'checkbox':
                        return validateChoice(field);
                    case 'tel':
                        return validatePhone(field);
                    case 'email':
                        return validateEmail(field);
                    case 'date':
                        return validateDate(field);
                    case 'password':
                        return validatePassword(field);
                    default:
                        throw new Error(
                            `The provided field type '${field.tagName}:${field.type}' is not supported in this form.`
                        );
                }

            };

            /*****************************************************************************
             * Expects a Node (field or fieldset).
             *
             * Returns the field's overall validity based on conditions set within
             * `getValidationData()`.
             */

            const isValid = field => {
                return getValidationData(field).isValid;
            };

            /*****************************************************************************
             * Expects an integer.
             *
             * Returns a promise that either resolves if all fields in a given step are
             * valid, or rejects and returns invalid fields for further processing.
             */

            const validateStep = currentStep => {
                const fields = tabPanels[currentStep].querySelectorAll(
                    'fieldset, input:not([type="radio"]):not([type="checkbox"]), select, textarea');

                const invalidFields = [...fields].filter(field => {
                    return !isValid(field);
                });

                return new Promise((resolve, reject) => {
                    if (invalidFields && !invalidFields.length) {
                        resolve();
                    } else {
                        reject(invalidFields);
                    }
                });
            };

            // Form Error and Success

            const FIELD_PARENT_CLASS = 'form__field',
                FIELD_ERROR_CLASS = 'form__error-text';

            /*****************************************************************************
             * Expects a Node (fieldset) that contains any number of radio or checkbox
             * input elements, and a string representing the group's validation status.
             */

            function updateChoice(fieldset, status, errorId = '') {
                const choices = fieldset.querySelectorAll('[type="radio"], [type="checkbox"]');

                for (const choice of choices) {
                    if (status) {
                        choice.setAttribute('aria-invalid', 'true');
                        choice.setAttribute('aria-describedby', errorId);
                    } else {
                        choice.removeAttribute('aria-invalid');
                        choice.removeAttribute('aria-describedby');
                    }
                }
            }

            /*****************************************************************************
             * Expects a Node (field or fieldset) that either has the class name defined
             * by `FIELD_PARENT_CLASS`, or has a parent with that class name. Optional
             * string defines the error message.
             *
             * Builds and appends an error message to the parent element, or updates an
             * existing error message.
             *
             * https://www.davidmacd.com/blog/test-aria-describedby-errormessage-aria-live.html
             */

            function reportError(field, message = 'Please complete this required field.') {
                const fieldParent = field.closest(`.${FIELD_PARENT_CLASS}`);

                if (progressForm.contains(fieldParent)) {
                    let fieldError = fieldParent.querySelector(`.${FIELD_ERROR_CLASS}`),
                        fieldErrorId = '';

                    if (!fieldParent.contains(fieldError)) {
                        fieldError = document.createElement('p');

                        if (field.matches('fieldset')) {
                            fieldErrorId = `${field.id}__error`;

                            updateChoice(field, true, fieldErrorId);
                        } else if (field.matches('[type="radio"], [type="checkbox"]')) {
                            fieldErrorId = `${field.closest('fieldset').id}__error`;

                            updateChoice(field.closest('fieldset'), true, fieldErrorId);
                        } else {
                            fieldErrorId = `${field.id}__error`;

                            field.setAttribute('aria-invalid', 'true');
                            field.setAttribute('aria-describedby', fieldErrorId);
                        }

                        fieldError.id = fieldErrorId;
                        fieldError.classList.add(FIELD_ERROR_CLASS);

                        fieldParent.appendChild(fieldError);
                    }

                    fieldError.textContent = message;
                }
            }

            /*****************************************************************************
             * Expects a Node (field or fieldset) that either has the class name defined
             * by `FIELD_PARENT_CLASS`, or has a parent with that class name.
             *
             * https://www.davidmacd.com/blog/test-aria-describedby-errormessage-aria-live.html
             */

            function reportSuccess(field) {
                const fieldParent = field.closest(`.${FIELD_PARENT_CLASS}`);

                if (progressForm.contains(fieldParent)) {
                    const fieldError = fieldParent.querySelector(`.${FIELD_ERROR_CLASS}`);

                    if (fieldParent.contains(fieldError)) {
                        if (field.matches('fieldset')) {
                            updateChoice(field, false);
                        } else if (field.matches('[type="radio"], [type="checkbox"]')) {
                            updateChoice(field.closest('fieldset'), false);
                        } else {
                            field.removeAttribute('aria-invalid');
                            field.removeAttribute('aria-describedby');
                        }

                        fieldParent.removeChild(fieldError);
                    }
                }
            }

            /*****************************************************************************
             * Expects a Node (field or fieldset).
             *
             * Reports the field's overall validity to the user based on conditions set
             * within `getValidationData()`.
             */

            function reportValidity(field) {
                const validation = getValidationData(field);

                if (!validation.isValid && validation.message) {
                    reportError(field, validation.message);
                } else if (!validation.isValid) {
                    reportError(field);
                } else {
                    reportSuccess(field);
                }
            }

            // Form Progression

            /*****************************************************************************
             * Resets the state of all tabs and tab panels.
             */

            function deactivateTabs() {
                // Reset state of all tab items
                tabItems.forEach(tab => {
                    tab.setAttribute('aria-selected', 'false');
                    tab.setAttribute('tabindex', '-1');
                });

                // Reset state of all panels
                tabPanels.forEach(panel => {
                    panel.setAttribute('hidden', '');
                });
            }

            /*****************************************************************************
             * Expects an integer.
             *
             * Shows the desired tab and its associated tab panel, then updates the form's
             * current step to match the tab's index.
             */

            function activateTab(index) {
                const thisTab = tabItems[index],
                    thisPanel = tabPanels[index];

                // Close all other tabs
                deactivateTabs();

                // Focus the activated tab for accessibility
                thisTab.focus();

                // Set the interacted tab to active
                thisTab.setAttribute('aria-selected', 'true');
                thisTab.removeAttribute('tabindex');

                // Display the associated tab panel
                thisPanel.removeAttribute('hidden');

                // Update the current step with the interacted tab's index value
                currentStep = index;
            }

            /*****************************************************************************
             * Expects an event from a click listener.
             */

            function clickTab(e) {
                activateTab([...tabItems].indexOf(e.currentTarget));
            }

            /*****************************************************************************
             * Expects an event from a keydown listener.
             */

            function arrowTab(e) {
                const {
                    keyCode,
                    target
                } = e;

                /**
                 * If the current tab has an enabled next/previous sibling, activate it.
                 * Otherwise, activate the tab at the beginning/end of the list.
                 */

                const targetPrev = target.previousElementSibling,
                    targetNext = target.nextElementSibling,
                    targetFirst = target.parentElement.firstElementChild,
                    targetLast = target.parentElement.lastElementChild;

                const isDisabled = node => node.hasAttribute('aria-disabled');

                switch (keyCode) {
                    case 37: // Left arrow
                        if (progressForm.contains(targetPrev) && !isDisabled(targetPrev)) {
                            activateTab(currentStep - 1);
                        } else if (!isDisabled(targetLast)) {
                            activateTab(tabItems.length - 1);
                        }
                        break;
                    case 39: // Right arrow
                        if (progressForm.contains(targetNext) && !isDisabled(targetNext)) {
                            activateTab(currentStep + 1);
                        } else if (!isDisabled(targetFirst)) {
                            activateTab(0);
                        }
                        break;
                }

            }

            /*****************************************************************************
             * Expects a boolean.
             *
             * Updates the visual state of the progress bar and makes the next tab
             * available for interaction (if there is a next tab).
             */

            // Immediately attach event listeners to the first tab (happens only once)
            tabItems[0].addEventListener('click', clickTab);
            tabItems[0].addEventListener('keydown', arrowTab);

            function handleProgress(isComplete) {
                const currentTab = tabItems[currentStep],
                    nextTab = tabItems[currentStep + 1];

                if (isComplete) {
                    currentTab.setAttribute('data-complete', 'true');

                    /**
                     * Verify that there is, indeed, a next tab before modifying or listening
                     * to it. In case we've reached the last item in the tablist.
                     */

                    if (progressForm.contains(nextTab)) {
                        nextTab.removeAttribute('aria-disabled');

                        nextTab.addEventListener('click', clickTab);
                        nextTab.addEventListener('keydown', arrowTab);
                    }

                } else {
                    currentTab.setAttribute('data-complete', 'false');
                }
            }

            // Form Interactions

            /*****************************************************************************
             * Returns a function that only executes after a delay.
             *
             * https://davidwalsh.name/javascript-debounce-function
             */

            const debounce = (fn, delay = 500) => {
                let timeoutID;

                return (...args) => {
                    if (timeoutID) {
                        clearTimeout(timeoutID);
                    }

                    timeoutID = setTimeout(() => {
                        fn.apply(null, args);
                        timeoutID = null;
                    }, delay);
                };
            };

            /*****************************************************************************
             * Waits 0.5s before reacting to any input events. This reduces the frequency
             * at which the listener is fired, making the errors less "noisy". Improves
             * both performance and user experience.
             */

            progressForm.addEventListener('input', debounce(e => {
                const {
                    target
                } = e;

                validateStep(currentStep).then(() => {

                    // Update the progress bar (step complete)
                    handleProgress(true);

                }).catch(() => {

                    // Update the progress bar (step incomplete)
                    handleProgress(false);

                });

                // Display or remove any error messages
                reportValidity(target);
            }));

            /****************************************************************************/

            progressForm.addEventListener('click', e => {
                const {
                    target
                } = e;

                if (target.matches('[data-action="next"]')) {
                    validateStep(currentStep).then(() => {

                        // Update the progress bar (step complete)
                        handleProgress(true);

                        // Progress to the next step
                        activateTab(currentStep + 1);

                    }).catch(invalidFields => {

                        // Update the progress bar (step incomplete)
                        handleProgress(false);

                        // Show errors for any invalid fields
                        invalidFields.forEach(field => {
                            reportValidity(field);
                        });

                        // Focus the first found invalid field for the user
                        invalidFields[0].focus();

                    });
                }

                if (target.matches('[data-action="prev"]')) {

                    // Revisit the previous step
                    activateTab(currentStep - 1);

                }
            });

            // Form Submission

            /*****************************************************************************
             * Returns the user's IP address.
             */

            async function getIP(url = 'https://api.ipify.org?format=json') {
                const response = await fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });



                if (!response.ok) {
                    throw new Error(response.statusText);
                }

                return response.json();
            }

            /*****************************************************************************
             * POSTs to the specified endpoint.
             */

            async function postData(url = '', data = {}) {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },

                    body: JSON.stringify(data)
                });


                if (!response.ok) {
                    throw new Error(response.statusText);
                }

                return response.json();
            }

            /****************************************************************************/

            function disableSubmit() {
                const submitButton = progressForm.querySelector('[type="submit"]');

                if (progressForm.contains(submitButton)) {

                    // Update the state of the submit button
                    submitButton.setAttribute('disabled', '');
                    submitButton.textContent = 'Submitting...';

                }
            }

            /****************************************************************************/

            function handleSuccess(response) {
                const thankYou = progressForm.querySelector('#progress-form__thank-you');

                // Clear all HTML Nodes that are not the thank you panel
                while (progressForm.firstElementChild !== thankYou) {
                    if (window.CP.shouldStopExecution(0)) break;
                    progressForm.removeChild(progressForm.firstElementChild);
                }
                window.CP.exitedLoop(0);

                thankYou.removeAttribute('hidden');

                // Logging the response from httpbin for quick verification
                console.log(response);
            }

            /****************************************************************************/

            function handleError(error) {
                const submitButton = progressForm.querySelector('[type="submit"]');

                if (progressForm.contains(submitButton)) {
                    const errorText = document.createElement('p');

                    // Reset the state of the submit button
                    submitButton.removeAttribute('disabled');
                    submitButton.textContent = 'Submit';

                    // Display an error message for the user
                    errorText.classList.add('m-0', 'form__error-text');
                    errorText.textContent = `Sorry, your submission could not be processed.
        Please try again. If the issue persists, please contact our support
        team. Error message: ${error}`;

                    submitButton.parentElement.prepend(errorText);
                }
            }

            /****************************************************************************/

            progressForm.addEventListener('submit', e => {

                // Prevent the form from submitting
                e.preventDefault();

                // Get the API endpoint using the form action attribute
                const form = e.currentTarget,
                    API = new URL(form.action);

                validateStep(currentStep).then(() => {

                    // Indicate that the submission is working
                    disableSubmit();

                    // Prepare the data
                    const formData = new FormData(form),
                        formTime = new Date().getTime(),
                        formFields = [];

                    // Format the data entries
                    for (const [name, value] of formData) {
                        formFields.push({
                            'name': name,
                            'value': value
                        });

                    }

                    // Get the user's IP address (for fun)
                    // Build the final data structure, including the IP
                    // POST the data and handle success or error
                    getIP().then(response => {
                        return {
                            'fields': formFields,
                            'meta': {
                                'submittedAt': formTime,
                                'ipAddress': response.ip
                            }
                        };


                    }).
                    then(data => postData(API, data)).
                    then(response => {
                        setTimeout(() => {
                                handleSuccess(response);
                            },
                            5000
                        ); // An artificial delay to show the state of the submit button
                    }).
                    catch(error => {
                        setTimeout(() => {
                                handleError(error);
                            },
                            5000
                        ); // An artificial delay to show the state of the submit button
                    });

                }).catch(invalidFields => {

                    // Show errors for any invalid fields
                    invalidFields.forEach(field => {
                        reportValidity(field);
                    });

                    // Focus the first found invalid field for the user
                    invalidFields[0].focus();

                });
            });
        });
    </script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap");

        /* ==========================================================================
               Variables
               ========================================================================== */

        :root {
            /* --- Colors --- */

            --light-blue-100: 199, 84%, 55%;
            /* #2bb0ed */
            --light-blue-500: 202, 83%, 41%;
            /* #127fbf */
            --light-blue-900: 204, 96%, 27%;
            /* #035388 */

            --blue-100: 210, 22%, 49%;
            /* #627d98 */
            --blue-500: 209, 34%, 30%;
            /* #334e68 */
            --blue-900: 209, 61%, 16%;
            /* #102a43 */

            --gray-100: 210, 36%, 96%;
            /* #f0f4F8 */
            --gray-300: 212, 33%, 89%;
            /* #d9e2ec */
            --gray-500: 210, 31%, 80%;
            /* #bcccdc */
            --gray-700: 211, 27%, 70%;
            /* #9fb3c8 */
            --gray-900: 209, 23%, 60%;
            /* #829ab1 */

            --white: 0, 0%, 100%;
            /* #ffffff */

            /* --- Typography --- */

            --font-family-sans-serif: "Montserrat", sans-serif;

            /* --- Layout --- */

            --space-multiplier: 0.8;

            --content-max-width: 140rem;

            --grid-spacer-width: 1.5rem;
            --grid-column-count: 12;
        }

        /* ==========================================================================
               Base
               ========================================================================== */

        /**
             * Reset box-sizing on all elements
             *
             * `border-box` includes padding and border in the calculations for total
             * width, height values. This is more predictable than the default
             * `content-box`, which does the opposite.
             *
             * 1. Apply `inherit` to all elements (global selector)
             * 2. Apply the same with a global selector for pseudo-elements
             */


        /**
             * 1. Now add `border-box` to `html`, which will cascade down through all
             *    elements, but leaves box-sizing easy to overwrite on a parent component
             *
             *    https://css-tricks.com/inheriting-box-sizing-probably-slightly-better-best-practice/
             *
             * 2. Set `html` font size to 62.5%, equal to 10px or 1rem
             *
             *    https://css-tricks.com/accessible-font-sizing-explained/
             *
             * 3. Set up full viewport height for sticky footer
             * 4. Prevent font size adjustment after orientation change in iOS
             */


        /* ==========================================================================
               Accessibility
               ========================================================================== */

        /* Visibility
               ========================================================================== */

        /**
             * Visually hidden class
             *
             * Hides content to visual users, but leaves it accessible to screen reader
             * users. The combination of these properties will ensure that the element
             * is truly hidden and not getting smushed in the corner of the screen.
             *
             * https://snook.ca/archives/html_and_css/hiding-content-for-accessibility
             *
             * 1. For long content, line feeds are not interpreted as spaces and small width
             *    causes content to wrap 1 word per line:
             *
             *    https://medium.com/@jessebeach/beware-smushed-off-screen-accessible-text-5952a4c2cbfe
             */

        .visually-hidden {
            border: 0;
            clip: rect(1px, 1px, 1px, 1px);
            clip-path: inset(50%);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute !important;
            white-space: nowrap;
            /* 1 */
            width: 1px;
        }

        /* ==========================================================================
               CSS Flex
               ========================================================================== */

        /* Flex Parent
               ========================================================================== */

        /**
             * These classes are named in the format `{breakpoint}:flex-{property}`
             *
             * Where `{breakpoint}` is one of sm, md, or lg
             *
             * Where `{property}` is one of:
             *    row
             *    row-reverse
             *    column
             *    column-reverse
             *    wrap
             *    wrap-reverse
             *    wrap-nowrap
             */

        .flex-row {
            flex-direction: row;
        }

        .flex-row-reverse {
            flex-direction: row-reverse;
        }

        .flex-column {
            flex-direction: column;
        }

        .flex-column-reverse {
            flex-direction: column-reverse;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .flex-wrap-reverse {
            flex-wrap: wrap-reverse;
        }

        .flex-wrap-nowrap {
            flex-wrap: nowrap;
        }

        @media only screen and (min-width: 640px) {
            .sm\:flex-row {
                flex-direction: row;
            }

            .sm\:flex-row-reverse {
                flex-direction: row-reverse;
            }

            .sm\:flex-column {
                flex-direction: column;
            }

            .sm\:flex-column-reverse {
                flex-direction: column-reverse;
            }

            .sm\:flex-wrap {
                flex-wrap: wrap;
            }

            .sm\:flex-wrap-reverse {
                flex-wrap: wrap-reverse;
            }

            .sm\:flex-wrap-nowrap {
                flex-wrap: nowrap;
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:flex-row {
                flex-direction: row;
            }

            .md\:flex-row-reverse {
                flex-direction: row-reverse;
            }

            .md\:flex-column {
                flex-direction: column;
            }

            .md\:flex-column-reverse {
                flex-direction: column-reverse;
            }

            .md\:flex-wrap {
                flex-wrap: wrap;
            }

            .md\:flex-wrap-reverse {
                flex-wrap: wrap-reverse;
            }

            .md\:flex-wrap-nowrap {
                flex-wrap: nowrap;
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:flex-row {
                flex-direction: row;
            }

            .lg\:flex-row-reverse {
                flex-direction: row-reverse;
            }

            .lg\:flex-column {
                flex-direction: column;
            }

            .lg\:flex-column-reverse {
                flex-direction: column-reverse;
            }

            .lg\:flex-wrap {
                flex-wrap: wrap;
            }

            .lg\:flex-wrap-reverse {
                flex-wrap: wrap-reverse;
            }

            .lg\:flex-wrap-nowrap {
                flex-wrap: nowrap;
            }
        }

        /* Flex Children
               ========================================================================== */

        /**
             * These classes are named in the format `{breakpoint}:flex-{property}`
             *
             * Where `{breakpoint}` is one of sm, md, or lg
             *
             * Where `{property}` is one of:
             *    1 - Allows the flex item the grow and shrink, 0% basis
             *    auto - Allows the flex item to grow and shrink, auto basis
             *    initial - Allows the flex item to shrink but not grow, auto basis
             *    none - Prevents the flex item from growing or shrinking
             */

        .flex-1 {
            flex: 1 1 0%;
        }

        .flex-auto {
            flex: 1 1 auto;
        }

        .flex-initial {
            flex: 0 1 auto;
        }

        .flex-none {
            flex: none;
        }

        @media only screen and (min-width: 640px) {
            .sm\:flex-1 {
                flex: 1 1 0%;
            }

            .sm\:flex-auto {
                flex: 1 1 auto;
            }

            .sm\:flex-initial {
                flex: 0 1 auto;
            }

            .sm\:flex-none {
                flex: none;
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:flex-1 {
                flex: 1 1 0%;
            }

            .md\:flex-auto {
                flex: 1 1 auto;
            }

            .md\:flex-initial {
                flex: 0 1 auto;
            }

            .md\:flex-none {
                flex: none;
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:flex-1 {
                flex: 1 1 0%;
            }

            .lg\:flex-auto {
                flex: 1 1 auto;
            }

            .lg\:flex-initial {
                flex: 0 1 auto;
            }

            .lg\:flex-none {
                flex: none;
            }
        }

        /* ==========================================================================
               CSS Grid
               ========================================================================== */

        /* Grid Children
               ========================================================================== */

        /**
             * These classes are named in the format `{breakpoint}:col-{count}`
             *
             * Where `{breakpoint}` is one of sm, md, or lg
             *
             * Where `{count}` is a number 1 - 6
             */

        .grid-col-1 {
            grid-template-columns: 1fr;
        }

        .grid-col-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-col-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid-col-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .grid-col-5 {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }

        .grid-col-6 {
            grid-template-columns: repeat(6, minmax(0, 1fr));
        }

        @media only screen and (min-width: 640px) {
            .sm\:grid-col-1 {
                grid-template-columns: 1fr;
            }

            .sm\:grid-col-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .sm\:grid-col-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .sm\:grid-col-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .sm\:grid-col-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .sm\:grid-col-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }
        }

        @media only screen and (min-width: 940px) {
            .md\:grid-col-1 {
                grid-template-columns: 1fr;
            }

            .md\:grid-col-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .md\:grid-col-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .md\:grid-col-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .md\:grid-col-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .md\:grid-col-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }
        }

        @media only screen and (min-width: 1240px) {
            .lg\:grid-col-1 {
                grid-template-columns: 1fr;
            }

            .lg\:grid-col-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .lg\:grid-col-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .lg\:grid-col-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .lg\:grid-col-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .lg\:grid-col-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }
        }

        /* Errors
               ========================================================================== */

        input[aria-invalid="true"],
        select[aria-invalid="true"],
        textarea[aria-invalid="true"] {
            --field-border-color: hsl(var(--form-error-color));
            --field-border: var(--field-border-width) var(--field-border-style) var(--field-border-color);
            --field-text-color: var(--error-text-color);
            box-shadow: 0 0 0 1px hsl(var(--form-error-color));
        }

        select[aria-invalid="true"] {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='hsl(356, 75%, 53%)' d='M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z'/%3E%3C/svg%3E");
        }

        /* --- Error Text --- */

        .form__error-text {
            color: var(--error-text-color);
            font-family: var(--error-text-font-family);
            font-size: var(--error-text-font-size);
            font-weight: var(--error-text-font-weight);
            letter-spacing: var(--error-text-letter-spacing);
            line-height: 1.6;
            margin-top: calc(var(--space-multiplier) * 1rem);
        }

        /* Tabs
               ========================================================================== */

        .progress-form__tabs {
            column-gap: 0;
        }

        @media only screen and (min-width: 640px) {
            .progress-form__tabs {
                column-gap: 0.2rem;
            }
        }

        .progress-form__tabs-item {
            --button-background-color: transparent;
            --button-border-width: 5px;
            --button-border-style: solid;
            --button-border-color: hsl(var(--gray-300));
            --button-border: var(--button-border-width) var(--button-border-style) var(--button-border-color);
            --button-border-radius: 0;
            --button-height: 1.4;
            --button-text-align: left;
            --button-text-color: hsl(var(--blue-900));
            --button-text-font-size: 14px;
            --button-text-letter-spacing: 0.025em;
            --button-text-shadow: none;

            background-color: var(--button-background-color);
            border: 0;
            border-top: var(--button-border);
            border-radius: var(--button-border-radius);
            color: var(--button-text-color);
            display: none;
            font-size: var(--button-text-font-size);
            letter-spacing: var(--button-text-letter-spacing);
            line-height: var(--button-height);
            position: relative;
            text-align: var(--button-text-align);
            text-shadow: var(--button-text-shadow);
            transition: color 0.2s ease-in-out;
            white-space: normal;
        }

        .progress-form__tabs-item:active {
            transform: none;
        }

        .progress-form__tabs-item:hover,
        .progress-form__tabs-item:focus {
            background-color: inherit;
            color: inherit;
        }

        .progress-form__tabs-item::before {
            background-color: hsl(var(--light-blue-500));
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            top: -5px;
            transition: width 0.2s ease-in-out;
            width: 0;
        }

        .progress-form__tabs-item>.step {
            color: hsl(var(--blue-100));
            font-size: 10px;
            font-weight: 500;
            text-transform: uppercase;
            transition: color 0.2s ease-in-out;
        }

        @media only screen and (min-width: 640px) {
            .progress-form__tabs-item {
                display: block;
            }
        }

        /* --- Current Step --- */

        .progress-form__tabs-item[aria-selected="true"] {
            display: block;
        }

        .progress-form__tabs-item[aria-selected="true"]::before {
            width: 50%;
        }

        .progress-form__tabs-item[aria-selected="true"]>.step {
            color: hsl(var(--light-blue-500));
        }

        /* --- Disabled Step --- */

        @media only screen and (min-width: 640px) {
            .progress-form__tabs-item[aria-disabled="true"] {
                --button-background-color: transparent;
                --button-text-color: hsl(var(--blue-100));

                background-color: var(--button-background-color);
                color: var(--button-text-color);
            }
        }

        /* --- Completed Step --- */

        .progress-form__tabs-item[data-complete="true"]::before {
            width: 100%;
        }

        .progress-form__tabs-item[data-complete="true"]>.step {
            color: hsl(var(--light-blue-500));
        }
    </style>
@endsection
