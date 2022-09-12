<?php
//fiscal year 
$fiscal_year = explode("-", $fiscal_period[0]['start_date']);
$end_fiscal_year = explode("-", $fiscal_period[0]['end_date']);
?>
<style>
  td,
  th {
    padding: 5px;
  }

  #top {
    background-color: red;
  }

  #header2 th {
    background: whitesmoke;
    color: #555;
  }

  #top th {
    background: #1c84c6;
    color: #fff;
    text-transform: uppercase;
  }

  #subtotal1 th {
    background: #F1DABB;
    color: #555
  }

  .border_none th {
    border: none;
  }

  #top_level_header th {
    background: #fff;
  }
</style>
<br>
<div class="modal inmodal fade" id="loan_loss_provision-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg-3">
    <div class="modal-content">
    </div>
  </div>
</div>
<div class="container-fluid" style="background: #fff;">
  <div id="div_portfolio_aging_printout" style="display: none;"></div>
  <div class="d-flex flex-row-reverse mx-2 pt-1">
    <a target="_blank" id="active-savings-excel-link">
      <a href="<?php echo base_url() . "portfolio_aging/export_to_excel" ?>" class="btn btn-sm btn-primary">
        <i class="fa fa-file-excel-o fa-2x"></i>
      </a>
    </a>&nbsp;
    <button data-bind="visible: !isPrinting_active()" onclick="handlePrint_portfolio_aging()" class="btn btn-sm btn-secondary">
      <i class="fa fa-print fa-2x"></i></button>
  </div>
  <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table-bordered display nowrap table-hover" id="tblPortfolio_aging" width="100%;background:#fff;padding-top:-10px;">
        <thead style="background-color: #eef21d;">
          <tr class="text-center pt-4" id="top" class="border_none">
            <th colspan="5">LOANS IN ARREARS BY AGE</th>
          </tr>
          
        </thead>
        <br />

        <tr id="header2">
          <th>Classification(Days)</th>
          <th>Number of Accounts</th>
          <th>Outstanding Loan Portfolio (UGX)</th>
        </tr>
        <tbody>
          <?php
          $id = 0;
          foreach ($all_portfolio_details['data'] as $key => $value) {
            foreach ($value as $key1 => $value1) {


          ?>
              <tr id="subtotal1">
                <td><a href='<?php echo site_url('Portfolio_aging/get_category_loan_lists/');
                              echo ++$id ?>' title="View all"><?php echo $key1 ?><?php ?></a></td>
                <?php
                foreach ($value1 as $key2 => $value2) {
                  $value3 = is_numeric($value2) ? number_format($value2) : $value2;
                ?>

                  <td><?php echo ($value3) ?></td>
                <?php

                }
                ?>
              </tr>
          <?php

            }
          }

          ?>

          <tr id="subtotal1">
            <th>Sub Total</th>
            <th><?php echo number_format($all_portfolio_details['sub_total_level1_num_acc']) ?></th>
            <th><?php echo number_format($all_portfolio_details['sub_total_level1_outstanding_loan_portfolio']) ?></th>
            <th>
            </th>
            
            
          </tr>



         
         

          

        </tbody>
      </table> <br><br>
      <?php  //$this->load->view('reports/receivables/loan_loss_provision-modal')
      ?>
      <script>
        function handlePrint_portfolio_aging() {
          // $('#btn_printing_shares_report').css('display', 'flex');
          //     $('#btn_print_active_report').css('display', 'none');
          $.ajax({
            url: '<?php echo site_url("portfolio_aging/pdf_printout"); ?>',
            data: {
              status_id: 1,
              state_id: 7,
            },
            type: 'POST',
            dataType: 'json',
            success: function(response) {

              $('#div_portfolio_aging_printout').html(response.the_page_data);
              printJS({
                printable: 'printable_portfolio_aging_pdf_printout',
                type: 'html',
                targetStyles: ['*'],
                documentTitle: response.sub_title
              });
            },
            fail: function(jqXHR, textStatus, errorThrown) {
              ;
              console.log("Network error. Data could not be loaded." + errorThrown + " " + textStatus);
            },
            error: function(err) {

            }
          });
        }

        function export_to_excel() {
          $.ajax({
            url: '<?php echo site_url("portfolio_aging/export_to_excel"); ?>',
            data: {
              status_id: 1,
              state_id: 7,


            },
            type: 'POST',
            dataType: 'json',
            success: function(response) {

              $('#div_portfolio_aging_printout').html(response.the_page_data);
              printJS({
                printable: 'printable_portfolio_aging_pdf_printout',
                type: 'html',
                targetStyles: ['*'],
                documentTitle: response.sub_title
              });
            },
            fail: function(jqXHR, textStatus, errorThrown) {

              console.log("Network error. Data could not be loaded." + errorThrown + " " + textStatus);
            },
            error: function(err) {

            }
          });


        }
      </script>
    </div>
  </div>
</div>