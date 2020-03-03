
<div id="page_content">

    <style media="screen">
        .modal__container {
            display: -ms-flexbox;
            display: flex;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.1);
        }
        .modal__featured {
            position: relative;
            -ms-flex: 1;
              flex: 1;
            padding: 20px;
            overflow: hidden;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }
        .modal__circle {
            position: absolute;
            top: 0;
            left: 0;
            height: 200%;
            width: 200%;
            background-color: #0675c1;
            border-radius: 50%;
            -ms-transform: translateX(-50%) translateY(-25%);
              transform: translateX(-50%) translateY(-25%);
        }
        .modal__product {
            position: absolute;
            top: 35%;
            left: 50%;
            max-width: 85%;
            -ms-transform: translateX(calc(-50% - 10px));
              transform: translateX(calc(-50% - 10px));
        }
        .modal__content {
            -ms-flex: 3;
              flex: 3;
            padding: 40px 30px;
        }
        @media screen and (max-width: 600px) {
            .modal__featured {
                display: none;
            }
        }
    </style>

    <div id="page_content_inner">
        <div class="uk-grid">
            <div class="uk-width-large-10-10">

                <div class="modal">
                    <div class="modal__container">
                        <div class="modal__featured">
                            <button type="button" class="button--transparent button--close">
                                <svg class="nc-icon glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                <g><path fill="#ffffff" d="M1.293,15.293L11,5.586L12.414,7l-8,8H31v2H4.414l8,8L11,26.414l-9.707-9.707 C0.902,16.316,0.902,15.684,1.293,15.293z"></path> </g></svg>
                                <span class="visuallyhidden">Return to Product Page</span>
                            </button>
                            <div class="modal__circle"></div>
                            <img src="<?php echo base_url('assets/img/partner.png') ?>" class="modal__product" />
                        </div>
                        <div class="modal__content">
                            <h2>PAYMENT FOR TUITION MATCHING</h2>
                            <p>After finalizing a tuition job to a tutor, we ask for 50% advance of first month’s salary as tuition matching charge (Only once for each tuition job).
                            </p>
                            <a class="uk-button uk-button-primary" style="background-color: #0675c1" href="<?php echo site_url('tutor/invoice_list') ?>">Click Here</a>
                            <hr>
                            <h2>PAYMENT FOR VERIFICATION</h2>
                            <p>By verifying profile, the tutor is ensuring his/her employer that the data he/she has provided in his/her profile is accurate & authentic.</p>
                            <a class="uk-button uk-button-primary" style="background-color: #0675c1" href="<?php echo site_url('tutor/verify_invoice_list') ?>">Click Here</a>
                            <br />
                            <br />
                            <hr />
                            <div class="uk-text-center">
                                <b>
                                    Your privacy is important to us. We ensure your data is secured at all times and never share them with third parties.
                                </b>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
