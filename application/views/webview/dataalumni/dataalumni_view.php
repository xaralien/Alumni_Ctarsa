<section class="galeryhead12">
  <div class="blogtext wrapper-body text-center">
    <h1>Data Alumni</h1>
    <p>Cari Temanmu untuk Memperluas Koneksi Melalui Wadah yang Kami</p>
    <p>Berikan, Senang Bisa Membantu</p>
  </div>
</section>


<section class="tablealumni">
  <div class="container">
    <div class="row mb-1">
      <div class="col-sm-2">

        <div class="export-wrapper">
          <label>Export:</label>
          <br>
          <a id="exportLink" href="#" onclick="exportDataPDF()">
            <!-- Your SVG code here -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
              <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
              <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z" />
            </svg>
            <!-- End of SVG code -->
            Download PDF
          </a>
          <br>
          <a id="exportLink" href="#" onclick="exportDataExcel()" style="color: green;">
            <!-- Your SVG code here -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-spreadsheet" viewBox="0 0 16 16">
              <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v4h10V2a1 1 0 0 0-1-1zm9 6h-3v2h3zm0 3h-3v2h3zm0 3h-3v2h2a1 1 0 0 0 1-1zm-4 2v-2H6v2zm-4 0v-2H3v1a1 1 0 0 0 1 1zm-2-3h2v-2H3zm0-3h2V7H3zm3-2v2h3V7zm3 3H6v2h3z" />
            </svg>
            <!-- End of SVG code -->
            Download Excel
          </a>

        </div>

      </div>

    </div>
    <div class="row mb-1">
      <div class="col-sm-2">
        <label>
          Sekolah:
          <select id="sekolah_filter" class="form-control input-sm">
            <option value="">All</option>
            <!-- Add your sekolah options here -->
            <?php
            $this->db->select('id,school_name');
            $this->db->from('mast_school');
            $this->db->where('active', 1);
            $this->db->order_by('school_name', "asc");
            $school = $this->db->get()->result();
            foreach ($school as $s) { ?>
              <option value="<?= $s->id ?>"><?= $s->school_name ?></option>
            <?php
            }
            ?>
          </select>
        </label>
      </div>
      <div class="col-sm-2">
        <label>
          Tahun Kelulusan:
          <select id="tahun_filter" class="form-control input-sm">
            <option value="">All</option>
            <!-- Add your sekolah options here -->
            <?php
            $this->db->select('year_graduate');
            $this->db->from('mast_students');
            $this->db->where('active', 1);
            $this->db->group_by('year_graduate');
            $this->db->order_by('year_graduate', "asc");
            $students = $this->db->get()->result();
            foreach ($students as $st) { ?>
              <option value="<?= $st->year_graduate ?>"><?= $st->year_graduate ?></option>
            <?php
            }
            ?>
          </select>
        </label>
      </div>
      <div class="col-sm-2">
        <label>
          Status:
          <select id="status_filter" class="form-control input-sm">
            <option value="">All</option>
            <!-- Add your status options here -->
            <option value="Bekerja">Bekerja</option>
            <option value="Kuliah">Kuliah</option>
            <option value="Gap Year">Gap Year</option>
            <option value="Tidak Terdata">Tidak Terdata</option>
          </select>
        </label>
      </div>
      <div class="col-sm-6">
        <div id="school_table_filter" class="dataTables_filter"></div>
      </div>
    </div>
    <table id="dataalumni" class="table table-striped table-bordered table-responsive" style="width: 100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama alumni</th>
          <th>Sekolah</th>
          <th>Tahun</th>
          <th>Status</th>
          <th>Instansi</th>


          <!--
              <th>Instansi</th>
              <th>Instagram</th>
              <th>Linkedin</th>
              <th>Facebook</th>
              <th>Tiktok</th>
              -->
        </tr>
      </thead>
      <!-- <tbody>
            <tr>
              <td>Tiger</td>
              <td>Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
              <td>5421</td>
            </tr>
            <tr>
              <td>brain</td>
              <td>Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
              <td>5421</td>
            </tr>
             Add more rows as needed -->
      <!-- </tbody>  -->
    </table>
  </div>
</section>