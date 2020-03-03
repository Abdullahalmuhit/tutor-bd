<?php defined('safe_access') or die('Restricted access!'); ?>

<style type="text/css" media="print">

    .noPrint{ display: none; }

</style>

<div id="page_content">

    <div id="page_content_inner">



        <div class="uk-width-medium-8-10 uk-container-center reset-print">



          <div class="uk-section-primary uk-preserve-color" style="margin: 0 0 0 20px; background: #0675c1; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">

             <div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200">

                 <nav class="uk-navbar-container">

                     <div class="uk-container uk-container-expand" style="padding: 0 10px">

                         <div uk-navbar>

                             <ul class="uk-nav" style="float: right">

                               <li style="cursor: pointer"><a style="color: #fff; cursor: pointer" href="<?php echo base_url('tutor/invoice_list'); ?>"><button class="uk-badge uk-badge-success" style="padding: 6px 12px 6px 12px; margin: 4px 0 4px 0; background: #34495e; cursor: pointer">TUITION MATCHING INVOICE LIST</button></a></li>

                             </ul>

                         </div>

                     </div>

                 </nav>

             </div>

          </div>



            <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>



                <div class="uk-width-large-7-10">

                    <?php if (empty($verify_invoice_lists)): ?>

                      <h1 style="text-align: center;">No invoice found!</h1>

                    <?php else: ?>

                      <div class="md-card md-card-single main-print" id="invoice">

                        <div id="invoice_preview"></div>

                        <div id="invoice_form"></div>

                      </div>

                    <?php endif ?>

                </div>

                <div class="uk-width-large-3-10 hidden-print uk-visible-large">

                    <div class="md-list-outside-wrapper">

                        <ul class="md-list md-list-outside invoices_list" id="invoices_list">

                            <!-- <button class="uk-button uk-button-primary" type="button" style="background-color: #0675c1; font-weight: bold" onclick="location.href='<?php echo base_url('tutor/invoice_list'); ?>';">Tuition Matching Invoice List</button> -->

                            <li class="heading_list">Verification Invoice</li>



                            <?php

                            foreach ($verify_invoice_lists as $invoice_list) { ?>

                                <li>

                                    <a href="#" class="md-list-content" data-paid-status="<?php echo $invoice_list['status']; ?>" data-invoice-id="<?php echo $invoice_list['id']; ?>" data-job_id="<?php echo $invoice_list['job_id']; ?>" data-date="<?php echo date('Y-m-d', strtotime($invoice_list['created_at'])); ?>" data-amount="<?php echo $invoice_list['amount']; ?>" data-tutor-id="<?php echo $invoice_list['tutor_id'] ?>" data-tutor-name="<?php echo $invoice_list['tutor_name'] ?>" data-tutor-email="<?php echo $invoice_list['tutor_email'] ?>" data-tutor-mobile="<?php echo $invoice_list['tutor_mobile'] ?>" data-job-title="Tutor profile verification charge" data-payment-date="<?php echo date('d/m/Y', strtotime($invoice_list['updated_at'])); ?>" data-due-date="<?php if($invoice_list['due_date']): echo date('d/m/Y', strtotime($invoice_list['due_date'])); else: echo '--'; endif ?>" data-tutor-gender="<?php echo $invoice_list['tutor_gender']; ?>">

                                        <span class="uk-badge uk-badge-<?php echo ($invoice_list['status'] == '0') ? 'danger' : 'success'; ?>"><?php echo ($invoice_list['status'] == '0') ? 'Due' : 'Paid'; ?></span>

                                        <span class="md-list-heading uk-text-truncate">Invoice <?php echo $invoice_list['id']; ?></span>

                                        <span class="uk-text-small uk-text-muted">Request ID - <?php echo $invoice_list['job_id']; ?>, <?php echo date('F j, Y', strtotime($invoice_list['created_at'])); ?></span>

                                    </a>

                                </li>

<?php } ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>



    </div>

</div>



<div id="sidebar_secondary">

    <div class="sidebar_secondary_wrapper uk-margin-remove"></div>

</div>



<script id="invoice_template" type="text/x-handlebars-template">

    <div class="uk-grid" style="margin: 0 !important">

      <div class="uk-width-medium-1-2 uk-width-small-1-1" style="padding-left: 20px !important">

        <div style="background-color: #0675c1; padding: 15px 15px 1px 15px; color: #dfe4ea">

          <img src="<?php echo base_url() ?>assets/img/caretutor_logo_white.png" alt="" height="15" width="150" class="">

          <p>Payment Helpline:<br>+8801870720116</p>

        </div>

        <div class="uk-panel" style="background-color: #0675c1; margin: 0; padding: 5px 15px 5px 15px; color: #dfe4ea">

            <p>Currency: <strong style="float: right">BDT</strong></p>

        </div>

        {{#ifCond invoice_id.invoice_paid_status '==' 0}}

          <div class="uk-panel" style="background-color: #fa983a; margin: 0; padding: 5px 15px 5px 15px; color: #dfe4ea">

            <p>Payment Status: <strong style="float: right">Due</strong></p>

          </div>

        {{/ifCond}}

        {{#ifCond invoice_id.invoice_paid_status '==' 1}}

          <div class="uk-panel" style="background-color: #00b894; margin: 0; padding: 5px 15px 5px 15px; color: #dfe4ea">

            <p>Payment Status: <strong style="float: right">Paid</strong></p>

          </div>

        {{/ifCond}}

        {{#ifCond invoice_id.invoice_paid_status '==' 0}}

          <div class="uk-panel" style="background-color: #b71540; margin: 0; padding: 5px 15px 5px 15px; color: #dfe4ea">

            <p>Last date of payment: <strong style="float: right">{{invoice_id.invoice_due_date}}</strong></p>

          </div>

        {{/ifCond}}

        {{#ifCond invoice_id.invoice_paid_status '==' 1}}

          <div class="uk-panel" style="background-color: #6c5ce7; margin: 0; padding: 5px 15px 5px 15px; color: #dfe4ea">

              <p>Date of Payment: <strong style="float: right">{{invoice_id.payment_date}}</strong></p>

          </div>

        {{/ifCond}}

      </div>

      <div class="uk-width-medium-1-2 uk-width-small-1-1 p-20 uk-text-right" style="padding-right: 20px !important">

        <?php if($invoice_list['status'] == '0'):?>

        <a style="color: #fff; cursor: pointer" target="blank" href="<?php echo base_url('tutor/makeVerificationPayment/{{invoice_id.invoice_number}}') ?>" class="pay_bill" data-job_id="{{invoice_id.invoice_job_id}}"><button class="uk-badge uk-badge-success" style="padding: 4px 10px 4px 10px; margin-top: 10px; cursor: pointer">Pay Now</button></a>

        <?php endif;?>

        <p style="margin-top: 50px">Bill to: <br>

          <strong>{{ invoice_id.tutor_name }}</strong> <br>

          Tutor Id: {{ invoice_id.tutor_id }} <br>

          Email: {{ invoice_id.tutor_email }} <br>

          Cell: {{ invoice_id.tutor_mobile }}

        </p>

      </div>

    </div>

    <div class="uk-grid">

      <div style="padding-left: 70px; margin: 20px; color: #0675c1">

        <span><h2 style="margin: 0 !important">INVOICE &nbsp; #{{ invoice_id.invoice_number }}</h2> ISSUE DATE: {{ invoice_id.invoice_date }}</span>

      </div>

    </div>

    <div class="uk-grid" style="margin: 20px !important; padding: 0 !important">

      <div class="uk-width-2-2" style="margin: 0 !important; padding: 0 !important">

        <table class="uk-table">

          <tr>

            <td style="color: #0675c1; font-weight: bold; border-bottom-style: solid; border-bottom-color: #0675c1; padding-left: 0 !important">Payment Info</td>

            <td style="color: #0675c1; font-weight: bold; border-bottom-style: solid; border-bottom-color: #0675c1; padding-left: 0 !important; text-align: right">Profile Verification Amount</td>

          </tr>

          <tr>

            <td style="padding-left: 0 !important">{{ invoice_id.invoice_job_title }}</td>

            <td style="padding-left: 0 !important" class="uk-text-right">{{ invoice_id.invoice_total_amount }} tk</td>

          </tr>

        </table>

      </div>

    </div>

    <div class="uk-grid" style="margin: 50px 20px 0 20px !important; padding: 0 !important">

      <div class="uk-width-3-5" style="margin: 0 !important; padding: 0 !important">

      </div>

      <div class="uk-width-2-5" style="margin: 0 !important; padding: 0 !important">

        <table class="uk-table">

          <tr>

            <td class="uk-text-left" style="padding-left: 0 !important">SubTotal:</td>

            <td class="uk-text-right" style="padding-left: 0 !important">{{ invoice_id.invoice_total_amount }} tk</td>

          </tr>

          <tr>

            <td class="uk-text-left" style="padding-left: 0 !important">Vat:</td>

            <td class="uk-text-right" style="padding-left: 0 !important">0 tk</td>

          </tr>

          <tr>

            {{#ifCond invoice_id.invoice_paid_status '==' 0}}

              <td class="uk-text-left" style="color: #0675c1; font-weight: bold; border-top-style: solid; border-top-color:#0675c1; padding-left: 0 !important">Total Due:</td>

            {{/ifCond}}

            {{#ifCond invoice_id.invoice_paid_status '==' 1}}

              <td class="uk-text-left" style="color: #0675c1; font-weight: bold; border-top-style: solid; border-top-color:#0675c1; padding-left: 0 !important">Total Paid:</td>

            {{/ifCond}}

            <td class="uk-text-right" style="color: #0675c1; font-weight: bold; border-top-style: solid; border-top-color:#0675c1; padding-left: 0 !important">{{ invoice_id.invoice_total_amount }} tk</td>

          </tr>

        </table>

      </div>

    </div>

    <div class="uk-grid">

      <div class="uk-width-2-2">

        <p style="text-align: center; margin: 50px">{{#ifCond invoice_id.tutor_gender '==' 'Male'}}Mr.{{/ifCond}}{{#ifCond invoice_id.tutor_gender '==' 'Female'}}Ms.{{/ifCond}} {{ invoice_id.tutor_name }}, thank you so much. We really appreciate your cooperation with us.</p>

      </div>

    </div>

</script>
