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
                        <h6 class="text-left">Personal details</h6>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input id="first_name" type="text"
                                    class="form-group-input form-control @error('first_name') is-invalid @enderror"
                                    name="first_name" value="{{ old('first_name') }}" placeholder="{{ __('First Name') }}"
                                    required autocomplete="first_name" autofocus>
                            </div>
                            <div class="col-sm-6">
                                <input id="last_name" type="text"
                                    class="form-group-input form-control @error('last_name') is-invalid @enderror"
                                    name="last_name" value="{{ old('last_name') }}" placeholder="{{ __('Last Name') }}"
                                    required autocomplete="last_name" autofocus>
                            </div>
                        </div>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail') }}" required
                            autocomplete="email">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input id="phone" type="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" placeholder="{{ __('Contact Number') }}" required
                                    autocomplete="phone">
                            </div>
                            <div class="col-sm-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                                    name="dob" value="{{ old('dob') }}" placeholder="{{ __('Date of Birth') }}"
                                    required autocomplete="dob">
                            </div>
                        </div>
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
                        <h6 class="text-left">Residential details</h6>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" value="{{ old('address') }}" placeholder="{{ __('Address') }}" required
                            autocomplete="address">
                        <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror"
                            name="address2" value="{{ old('address2') }}" placeholder="{{ __('City/State') }}" required
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
                                    name="address4" value="{{ old('address4') }}" placeholder="{{ __('Postcode') }}"
                                    required autocomplete="address4">

                            </div>
                        </div>
                        <h6 class="text-left">Bank info</h6>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input id="bank-name" type="text"
                                    class="form-group-input form-control @error('bank-name') is-invalid @enderror"
                                    name="bank-name" value="{{ old('bank-name') }}" placeholder="{{ __('Bank Name') }}"
                                    required autocomplete="bank-name">

                            </div>
                            <div class="col-sm-6">
                                <input id="bank-code" type="text"
                                    class="form-group-input form-control @error('bank-code') is-invalid @enderror"
                                    name="bank-code" value="{{ old('bank-code') }}" placeholder="{{ __('Code') }}"
                                    required autocomplete="bank-code">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input id="bank-account-name" type="text"
                                    class="form-control @error('bank-account-name') is-invalid @enderror"
                                    name="bank-account-name" value="{{ old('bank-account-name') }}"
                                    placeholder="{{ __('Bank Account Name') }}" required
                                    autocomplete="bank-account-name">

                            </div>
                            <div class="col-sm-6">
                                <input id="bank-account-number" type="text"
                                    class="form-control @error('bank-account-number') is-invalid @enderror"
                                    name="bank-account-number" value="{{ old('bank-account-number') }}"
                                    placeholder="{{ __('Bank Account Number') }}" required
                                    autocomplete="bank-account-number">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6" style="text-align: start;">
                                <button class="btn btn-liq-main" type="submit">Sign Up</button>
                            </div>

                            <div class="col-sm-12">
                                <p class="signup">
                                    Already have an account ?
                                    <a href="#" onclick="toggleForm();">Sign In.</a>
                                </p>
                            </div>
                        </div>

                    </form>
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
