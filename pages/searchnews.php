<?php include('includes/header.php');?>


      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h2>Search Links</h2>
                          <form>
                              <select onchange="showRSS(this.value)">
                                  <option value="">Select an RSS-feed:</option>
                                  <option value="Google">Google News</option>
                                  <option value="Eng">Engineering Daily</option>
                              </select>
                          </form>
                          <br />
                          <div id="rssOutput"> Output Here</div>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php include('includes/footer.php');?>
