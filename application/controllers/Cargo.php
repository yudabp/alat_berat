<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
    $this->load->model('Quonum');
    date_default_timezone_set("Asia/Jakarta");
    qazwsxedc();
  }

  //-------------------------QUOTATION------------------------------

  public function quotation()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    // $data['view'] = $this->ShowModel->getDataWHere('quotation',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['view'] = $this->db->order_by('quotationcreated','desc')
                            ->get_where('quotation',['idcompany'=>$this->session->userdata('idcompany')])
                            ->result();
    // $data['contacts'] = $this->db->get_where('contacts',['idcontacts'=>$data['view']->idcontacts])
    //                         ->result();

    $this->load->view('cargo/quotation',$data);
  }



  // public function coba_num()
  // {
  //   $kode = $this->QuoNum->quote_number;
  //   echo $kode;
  //   echo "wkwkwkwkwk";
  // }

  public function add_quotation()
  {
    $quonum = $_GET['number'];
    $num = $this->db->get_where('quotation',['quote_number'=>$quonum])->row();
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['view'] = $this->db->order_by('ratecreated','desc')
                            ->get_where('rate_quote',['id_quotation'=>$num->id_quotation])
                            ->result();
    $data['cost'] = $this->db->order_by('estimationcreated','desc')
                            ->get_where('estimation_cost',['id_quotation'=>$num->id_quotation])
                            ->result();
    $data['customer_name'] = $this->db->group_by("company")
                            ->order_by('contactcreated','desc')
                            ->get_where('contacts',['idcompany'=>$this->session->userdata('idcompany')])
                            ->result();
    $data['branch_office'] = $this->db->get_where('branch_office',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['port'] = $this->db->get_where('port',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['kodeunik'] = $this->Quonum->quote_number();
    $this->load->view('cargo/add quotation',$data);
  }

  public function savequotation()
  {
    $id_quotation = $this->uuid->v4();
    $quote_number = $this->input->post('quote_number');
    $quote_date = $this->input->post('quote_date');
    $shipping_from = $this->input->post("shipping_from");
    $destination = $this->input->post('destination');
    $customer_name = $this->input->post('customer_name');
    $subject = $this->input->post('subject');
    $expires_date = $this->input->post('expires_date');
    $term_payment = $this->input->post('term_payment');
    $desk_header = $this->input->post('desk_header');
    $desk_footer = $this->input->post('desk_footer');

    $inEnter = $this->InsertModel->indata('quotation',[
      'id_quotation'=>$id_quotation,
      'idcompany' =>$this->session->userdata('idcompany'),
      'quote_number'=>$quote_number,
      'quote_date'=>$quote_date,
      'shipping_from' => $shipping_from,
      'destination' => $destination,
      'customer'=>$customer_name,
      'subject'=>$subject,
      'expires_date'=>$expires_date,
      'term_op'=>$term_payment,
      'desk_header'=>$desk_header,
      'desk_footer'=>$desk_footer,
      'creator'=>$this->session->userdata('username'),
    ]);

    if ($inEnter==TRUE) {
      $this->session->set_flashdata('suc','Data has been added');
      // redirect('add-quotation?number='.$quote_number);
    }else{
      echo"fail";
    }
  }

  public function upQuo()
  {
    // echo "Ini UpQuo";
    $id_quotation = $this->input->post('id_quotation');
    $quote_number = $this->input->post('quote_number');
    $quote_date = $this->input->post('quote_date');
    $shipping_from = $this->input->post("shipping_from");
    $destination = $this->input->post('destination');
    $customer_name = $this->input->post('customer_name');
    $subject = $this->input->post('subject');
    $expires_date = $this->input->post('expires_date');
    $term_payment = $this->input->post('term_payment');
    $desk_header = $this->input->post('desk_header');
    $desk_footer = $this->input->post('desk_footer');

    $data = array(
      'quote_number'=>$quote_number,
      'quote_date'=>$quote_date,
      'shipping_from' => $shipping_from,
      'destination' => $destination,
      'customer'=>$customer_name,
      'subject'=>$subject,
      'expires_date'=>$expires_date,
      'term_op'=>$term_payment,
      'desk_header'=>$desk_header,
      'desk_footer'=>$desk_footer,   
    );

     //$inSave = $this->InsertModel->updata('quotation',$data,['id_quotation'=>$id_quotation]);
    $inSave = $this->db->where(['id_quotation'=>$id_quotation])
                       ->update('quotation',$data);

    if ($inSave) {
      $this->session->set_flashdata('suc','Data has been added');
      // redirect('add-quotation?number='.$quote_number);
    }else{
      echo"fail";
    }
  }

  public function editQuo()
  {
    
  }

  public function delQuo()
  {
    $id = $this->uri->segment(2);
    $this->DeleteModel->delItem('quotation',['id_quotation'=>$id]);
    $this->session->set_flashdata('item','Data has been deleted');
    redirect('quotation');
  }

  public function saveRC()
  {
    $id_rate_quote = $this->uuid->v4();
    $id_quotation = $this->input->post('id_quo');
    $item_cost = $this->input->post('rate_item_cost');
    $unit = $this->input->post('rate_unit');
    $qty = $this->input->post('rate_qty');
    $price = $this->input->post('rate_price');
    $amount = $qty * $price;
    $prices = $this->input->post('rate_prices');
    $note = $this->input->post('note');

    if ($prices == 'IDR') {
      $data = array(
        'id_rate_quote'=>$id_rate_quote,
        'id_quotation'=>$id_quotation,
        'item_cost'=>$item_cost,
        'unit'=>$unit,
        'qty'=>$qty,
        'price' => $price,
        'amount_idr'=>$amount,
        'amount_usd'=>0,
        'note'=>$note,
      );
    }else {
      $data = array(
        'id_rate_quote'=>$id_rate_quote,
        'id_quotation'=>$id_quotation,
        'item_cost'=>$item_cost,
        'unit'=>$unit,
        'qty'=>$qty,
        'price' => $price,
        'amount_idr'=>0,
        'amount_usd'=>$amount,
        'note'=>$note,
      );
    }

    $num = $this->ShowModel->getDataWHere('quotation',['id_quotation'=>$id_quotation])->row();

    $inEnter = $this->InsertModel->indata('rate_quote',$data);

    if ($inEnter==TRUE) {
      $this->session->set_flashdata('suc','Data has been added');
    }else{
      echo"fail";
    }
  }

  public function uptRate()
  {
    $id_rate_quote = $this->input->post('id_rate_quote');
    $id_quotation = $this->input->post('id_quo');
    $item_cost = $this->input->post('rate_item_cost');
    $unit = $this->input->post('rate_unit');
    $qty = $this->input->post('rate_qty');
    $price = $this->input->post('rate_price');
    $amount = $qty * $price;
    $prices = $this->input->post('rate_prices');
    $note = $this->input->post('note');

    if ($prices == 'IDR') {
      $data = array(
        // 'id_rate_quote'=>$id_rate_quote,
        'id_quotation'=>$id_quotation,
        'item_cost'=>$item_cost,
        'unit'=>$unit,
        'qty'=>$qty,
        'price' => $price,
        'amount_idr'=>$amount,
        'amount_usd'=>0,
        'note'=>$note,
      );
    }else {
      $data = array(
        // 'id_rate_quote'=>$id_rate_quote,
        'id_quotation'=>$id_quotation,
        'item_cost'=>$item_cost,
        'unit'=>$unit,
        'qty'=>$qty,
        'price' => $price,
        'amount_idr'=>0,
        'amount_usd'=>$amount,
        'note'=>$note,
      );
    }

    $num = $this->ShowModel->getDataWHere('quotation',['id_quotation'=>$id_quotation])->row();

    $inSave = $this->db->where(['id_rate_quote'=>$id_rate_quote])
                       ->update('rate_quote',$data);

    if ($inSave==TRUE) {
      $this->session->set_flashdata('suc','Data has been added');
    }else{
      echo"fail";
    }
  }

   public function delRate()
  {
    $id = $this->uri->segment(2);
    $this->DeleteModel->delItem('rate_quote',['id_rate_quote'=>$id]);
    $this->session->set_flashdata('item','Data has been deleted');
    // redirect('add-quotation');
    ?>
    <script type="text/javascript">
      history.go(-1);
    </script>
    <?php
  }

  public function editRate()
  {
    $id = $this->input->post('id');
    $data = $this->db->get_where('rate_quote',['id_rate_quote'=>$id])
                            ->row_array();
    echo json_encode($data);
  }

  public function saveEst()
  {
    $id_estimation = $this->uuid->v4();
    $id_quotation = $this->input->post('id_quo_est');
    $item_cost = $this->input->post('est_item_cost');
    $unit = $this->input->post('est_unit');
    $qty = $this->input->post('est_qty');
    $price = $this->input->post('est_price');
    $amount = $qty * $price;
    $prices = $this->input->post('est_prices');
    $vendor = $this->input->post('vendor');

    if ($prices == 'IDR') {
      $data = array(
        'id_estimation'=>$id_estimation,
        'id_quotation'=>$id_quotation,
        'item_cost'=>$item_cost,
        'unit'=>$unit,
        'qty'=>$qty,
        'price' => $price,
        'amount_idr'=>$amount,
        'amount_usd'=>0,
        'vendor'=>$vendor,
      );
    }else {
      $data = array(
        'id_estimation'=>$id_estimation,
        'id_quotation'=>$id_quotation,
        'item_cost'=>$item_cost,
        'unit'=>$unit,
        'qty'=>$qty,
        'price' => $price,
        'amount_idr'=>0,
        'amount_usd'=>$amount,
        'vendor'=>$vendor,
      );
    }

    $num = $this->ShowModel->getDataWHere('quotation',['id_quotation'=>$id_quotation])->row();

    $inEnter = $this->InsertModel->indata('estimation_cost',$data);

    if ($inEnter==TRUE) {
      $this->session->set_flashdata('suc','Data has been added');
    }else{
      echo"fail";
    }
  }

  public function uptEst()
  {
    $id_estimation = $this->input->post('id_estimation');
    $id_quotation = $this->input->post('id_quo_est');
    $item_cost = $this->input->post('est_item_cost');
    $unit = $this->input->post('est_unit');
    $qty = $this->input->post('est_qty');
    $price = $this->input->post('est_price');
    $amount = $qty * $price;
    $prices = $this->input->post('est_prices');
    $vendor = $this->input->post('vendor');

    if ($prices == 'IDR') {
      $data = array(
        // 'id_est_quote'=>$id_est_quote,
        'id_quotation'=>$id_quotation,
        'item_cost'=>$item_cost,
        'unit'=>$unit,
        'qty'=>$qty,
        'price' => $price,
        'amount_idr'=>$amount,
        'amount_usd'=>0,
        'vendor'=>$vendor,
      );
    }else {
      $data = array(
        // 'id_est_quote'=>$id_est_quote,
        'id_quotation'=>$id_quotation,
        'item_cost'=>$item_cost,
        'unit'=>$unit,
        'qty'=>$qty,
        'price' => $price,
        'amount_idr'=>0,
        'amount_usd'=>$amount,
        'vendor'=>$vendor,
      );
    }

    $num = $this->ShowModel->getDataWHere('quotation',['id_quotation'=>$id_quotation])->row();

    $inSave = $this->db->where(['id_estimation'=>$id_estimation])
                       ->update('estimation_cost',$data);

    if ($inSave==TRUE) {
      $this->session->set_flashdata('suc','Data has been added');
    }else{
      echo"fail";
    }
  }

   public function delEst()
  {
    $id = $this->uri->segment(2);
    $this->DeleteModel->delItem('estimation_cost',['id_estimation'=>$id]);
    $this->session->set_flashdata('item','Data has been deleted');
    // redirect('add-quotation');
    ?>
    <script type="text/javascript">
      history.go(-1);
    </script>
    <?php
  }

  public function editEst()
  {
    $id = $this->input->post('id');
    $data = $this->db->get_where('estimation_cost',['id_estimation'=>$id])
                            ->row_array();
    echo json_encode($data);
  }

  //-------------------------JOB ORDER------------------------------

  public function job_order()
  {
    $idcompany = $this->session->userdata('idcompany');
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['view'] = $this->db->select('*')
                            ->join('quotation','quotation.id_quotation = job_order.id_quotation')
                            ->join('jo_data_sea','jo_data_sea.id_job_order = job_order.id_job_order')
                            ->join('jo_data','jo_data.id_job_order = job_order.id_job_order')
                            ->get_where('job_order',['job_order.idcompany'=>$this->session->userdata('idcompany')])
                            ->result();
    $this->load->view('cargo/job order',$data);
  }

  public function add_job_order()
  {
    // $id_quotation = $this->input->post('id');
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    // $data['quo'] = $this->db->get_where('quotation',['id_quotation'=>$id_quotation])->row();
    $data['kodeunik'] = $this->Quonum->jo_number();
    $data['client'] = $this->db->group_by("company")
                            ->order_by('contactcreated','desc')
                            ->get_where('contacts',['idcompany'=>$this->session->userdata('idcompany')])
                            ->result();
    $this->load->view('cargo/add job order',$data);
  }

  public function saveJob()
  {
    // Value Job Order
    $id_job_order = $this->uuid->v4();
    $jo_number = $this->input->post('jo_number');
    $jo_date = $this->input->post('jo_date');
    $jo_type = $this->input->post('jo_type');
    $freight_type = $this->input->post('freight_type');
    $id_quotation = $this->input->post('id_quotation');
    // Value Data
    $id_jo_data = $this->uuid->v4('id_jo_data');
    // Value Data Air
    $id_data_air = $this->uuid->v4('id_data_air');
    // Value Data Container
    $id_data_container = $this->uuid->v4('id_data_container');
    // Value Data Pieces
    $id_data_pieces = $this->uuid->v4('id_data_pieces');
    // Value Data Sea
    $id_data_sea = $this->uuid->v4('id_data_sea');
    // Value Data Status
    $id_data_status = $this->uuid->v4('id_data_status');

    // Proses Job Order
    $inEnter = $this->InsertModel->indata('job_order',[
      'id_job_order'=>$id_job_order,
      'idcompany' =>$this->session->userdata('idcompany'),
      'id_quotation'=>$id_quotation,
      'jo_number'=>$jo_number,
      'jo_date'=>$jo_date,
      'jo_type'=>$jo_type,
      'freight_type'=>$freight_type,
      'creator'=>$this->session->userdata('username')
    ]);
    // Proses Data
    $inData = $this->InsertModel->indata('jo_data',[
      'id_jo_data'=>$id_jo_data,
      'id_job_order'=>$id_job_order,
      'shipper'=>'',
      'consignee'=>'',
      'notify_party'=>'',
      'agent'=>'',
      'etd'=>'',
      'eta'=>'',
      'stuffing'=>'',
      'receive'=>'',
      'loading'=>'NA',
      'discharge'=>'NA',
      'delivery'=>'',
      'hs_code'=>'',
      'deskripsi'=>'',
    ]);
    // Proses Data Air
    $inAir = $this->InsertModel->indata('jo_data_air',[
      'id_data_air'=>$id_data_air,
      'id_job_order'=>$id_job_order,
      'airlines'=>'',
      'flight_number'=>'',
      'hawb_number'=>'',
      'mawb_number'=>'',
      'aita_code'=>'',
    ]);
    // Proses Data Container
    // $inContainer = $this->InsertModel->indata('jo_data_container',[
    //   'id_data_container'=>$id_data_container,
    //   'id_job_order'=>$id_job_order,
    //   'container_number'=>'',
    //   'seal_number'=>'',
    //   'type'=>'',
    //   'measurement'=>'',
    //   'net_weight'=>'',
    //   'gross_weight'=>'',
    // ]);
    // Proses Data Pieces
    // $inPieces = $this->InsertModel->indata('jo_data_pieces',[
    //   'id_data_pieces'=>$id_data_pieces,
    //   'id_job_order'=>$id_job_order,
    //   'no_of_pieces'=>'',
    //   'type'=>'',
    //   'gross_weight'=>'',
    //   'chargeable_weight'=>'',
    // ]);
    // Proses Data Sea 
    $inSea = $this->InsertModel->indata('jo_data_sea',[
      'id_data_sea'=>$id_data_sea,
      'id_job_order'=>$id_job_order,
      'shipping_line'=>'',
      'shipment_number'=>'',
      'shipping_mark'=>'',
      'qty'=>'',
      'piece'=>'',
      'type'=>'',
      'bl_number'=>'',
      'mbl_number'=>'',
      'voyage'=>'',
      'vessel'=>'',
      'issued_office'=>'',
    ]);
    // Proses Data Status
    // $inStatus = $this->InsertModel->indata('jo_data_status',[
    //   'id_data_status'=>$id_data_status,
    //   'id_job_order'=>$id_job_order,
    //   'date'=>'',
    //   'time'=>'',
    //   'status'=>'',
    //   'note'=>'',
    // ]);

    if ($inEnter==TRUE) {
      $this->session->set_flashdata('suc','Data has been added');
      // redirect('add-quotation?number='.$quote_number);
    }else{
      echo"fail";
    }
  }

  public function uptJob()
  {
    // Value Job Order
    $id_job_order = $this->input->post('id_job_order');
    $jo_number = $this->input->post('jo_number');
    $jo_date = $this->input->post('jo_date');
    $jo_type = $this->input->post('jo_type');
    $freight_type = $this->input->post('freight_type');
    $id_quotation = $this->input->post('id_quotation');
    // Value Data
    // $id_jo_data = $this->uuid->v4('id_jo_data');
    $shipper = $this->input->post('shipper');
    $consignee = $this->input->post('consignee');
    $notify_party = $this->input->post('notify_party');
    $agent = $this->input->post('agent');
    $etd = $this->input->post('etd');
    $eta = $this->input->post('eta');
    $stuffing = $this->input->post('stuffing');
    $receive = $this->input->post('receive');
    $loading = $this->input->post('loading');
    $discharge = $this->input->post('discharge');
    $delivery = $this->input->post('delivery');
    $hs_code = $this->input->post('hs_code');
    $deskripsi = $this->input->post('deskripsi');
    // Value Data Air
    // $id_data_air = $this->uuid->v4('id_data_air');
    $airlines = $this->input->post('airlines');
    $flight_number = $this->input->post('flight_number');
    $hawb_number = $this->input->post('hawb_number');
    $mawb_number = $this->input->post('mawb_number');
    $aita_code = $this->input->post('aita_code');
    // Value Data Sea
    // $id_data_sea = $this->uuid->v4('id_data_sea');
    $shipping_line = $this->input->post('shipping_line');
    $shipment_number = $this->input->post('shipment_number');
    $shipping_mark = $this->input->post('shipping_mark');
    $qty = $this->input->post('qty');
    $piece = $this->input->post('piece');
    $type = $this->input->post('type');
    $bl_number = $this->input->post('bl_number');
    $mbl_number = $this->input->post('mbl_number');
    $voyage = $this->input->post('voyage');
    $vessel = $this->input->post('vessel');
    $issued_office = $this->input->post('issued_office');
    // Value Data Container
    // $id_data_container = $this->uuid->v4('id_data_container');
    // Value Data Pieces
    // $id_data_pieces = $this->uuid->v4('id_data_pieces');
    // Value Data Status
    // $id_data_status = $this->uuid->v4('id_data_status');

    // Proses Job Order
    $inEnter = $this->db->where(['id_job_order'=>$id_job_order])
                       ->update('job_order',[
                        // 'id_job_order'=>$id_job_order,
                        // 'idcompany' =>$this->session->userdata('idcompany'),
                        // 'id_quotation'=>$id_quotation,
                        // 'jo_number'=>$jo_number,
                        'jo_date'=>$jo_date,
                        'jo_type'=>$jo_type,
                        'freight_type'=>$freight_type,
                        'creator'=>$this->session->userdata('username')
                      ]);
    // Proses Data
    $inData = $this->db->where(['id_job_order'=>$id_job_order])
                       ->update('jo_data',[
                        'shipper'=>$shipper,
                        'consignee'=>$consignee,
                        'notify_party'=>$notify_party,
                        'agent'=>$agent,
                        'etd'=>$etd,
                        'eta'=>$eta,
                        'stuffing'=>$stuffing,
                        'receive'=>$receive,
                        'loading'=>$loading,
                        'discharge'=>$discharge,
                        'delivery'=>$delivery,
                        'hs_code'=>$hs_code,
                        'deskripsi'=>$deskripsi,
                      ]);
    // Proses Data Air
    $inAir = $this->db->where(['id_job_order'=>$id_job_order])
                       ->update('jo_data_air',[
                        'airlines'=>$airlines,
                        'flight_number'=>$flight_number,
                        'hawb_number'=>$hawb_number,
                        'mawb_number'=>$mawb_number,
                        'aita_code'=>$aita_code,
                      ]);
    // Proses Data Sea 
    $inSea = $this->db->where(['id_job_order'=>$id_job_order])
                       ->update('jo_data_sea',[
                        'shipping_line'=>$shipping_line,
                        'shipment_number'=>$shipment_number,
                        'shipping_mark'=>$shipping_mark,
                        'qty'=>$qty,
                        'piece'=>$piece,
                        'type'=>$type,
                        'bl_number'=>$bl_number,
                        'mbl_number'=>$mbl_number,
                        'voyage'=>$voyage,
                        'vessel'=>$vessel,
                        'issued_office'=>$issued_office,
                      ]);
                       
    if ($inEnter==TRUE) {
      $this->session->set_flashdata('suc','Data has been added');
      // redirect('add-quotation?number='.$quote_number);
    }else{
      echo"fail";
    }
  }

  //Data Container
  public function add_jo_container(){
    $id_data_container = $this->uuid->v4();
    $id_job_order = $this->input->post("id_job");
    $con_number = $this->input->post("container_number");
    $seal_number = $this->input->post("seal_number");
    $type = $this->input->post("type_container");
    $measurement = $this->input->post("measurement");
    $net_weight = $this->input->post("net_weight");
    $gross_weight = $this->input->post("gross_weight");

    $this->db->insert("jo_data_container", [
      "id_data_container" => $id_data_container,
      "id_job_order" => $id_job_order,
      "container_number" => $con_number,
      "seal_number" => $seal_number,
      "type" => $type,
      "measurement" => $measurement,
      "net_weight" => $net_weight,
      "gross_weight" => $gross_weight
    ]);
    
    echo json_encode(array("result" => "success"));
  }

  public function del_jo_container(){
    $id_data_container = $this->input->post("data_con");

    $this->db->delete("jo_data_container", ['id_data_container' => $id_data_container]);

    echo json_encode(array("result" => "success"));
  }

  public function edit_jo_container(){
    $id_data_container = $this->input->post("data_con");
    $data = $this->db->get_where("jo_data_container", ['id_data_container' => $id_data_container]);
    if($data->num_rows() > 0){
      $result = "success";
      $container = $data->row_array();
    }
    else{
      $result = "failed";
      $container = "";
    }
    echo json_encode(array("result" => $result, "container" => $container));
  }

  public function update_jo_container(){
    $id_data_container = $this->input->post("id_data_con");
    $id_job_order = $this->input->post("id_job");
    $con_number = $this->input->post("container_number");
    $seal_number = $this->input->post("seal_number");
    $type = $this->input->post("type_container");
    $measurement = $this->input->post("measurement");
    $net_weight = $this->input->post("net_weight");
    $gross_weight = $this->input->post("gross_weight");

    $this->db->update("jo_data_container", ["container_number" => $con_number,"seal_number" => $seal_number, "type" => $type, "measurement" => $measurement, "net_weight" => $net_weight, "gross_weight" => $gross_weight], ['id_data_container' => $id_data_container, 'id_job_order' => $id_job_order]);

    echo json_encode(array("result" => "success"));

  }

  //Data Pieces
  public function add_jo_pieces(){
    $id_data_pieces = $this->uuid->v4();
    $id_job_order = $this->input->post("id_job");
    $no_of_pieces = $this->input->post("no_of_pieces");
    $type = $this->input->post("type_pieces");
    $gross_weight = $this->input->post("gross_weight");
    $chargeable_weight = $this->input->post("chargeable_weight");

    $this->db->insert("jo_data_pieces", [
      "id_data_pieces" => $id_data_pieces,
      "id_job_order" => $id_job_order,
      "no_of_pieces" => $no_of_pieces,
      "type" => $type,
      "gross_weight" => $gross_weight,
      "chargeable_weight" => $chargeable_weight
    ]);
    
    echo json_encode(array("result" => "success"));
  }

  public function del_jo_pieces(){
    $id_data_pieces = $this->input->post("data_pieces");

    $this->db->delete("jo_data_pieces", ['id_data_pieces' => $id_data_pieces]);

    echo json_encode(array("result" => "success"));
  }

  public function edit_jo_pieces(){
    $id_data_pieces = $this->input->post("data_pieces");
    $data = $this->db->get_where("jo_data_pieces", ['id_data_pieces' => $id_data_pieces]);
    if($data->num_rows() > 0){
      $result = "success";
      $pieces = $data->row_array();
    }
    else{
      $result = "failed";
      $pieces = "";
    }
    echo json_encode(array("result" => $result, "pieces" => $pieces));
  }

  public function update_jo_pieces(){
    $id_data_pieces = $this->input->post("id_data_pieces");
    $id_job_order = $this->input->post("id_job");
    $no_of_pieces = $this->input->post("no_of_pieces");
    $type = $this->input->post("type_pieces");
    $gross_weight = $this->input->post("gross_weight");
    $chargeable_weight = $this->input->post("chargeable_weight");

    $this->db->update("jo_data_pieces", ['no_of_pieces' => $no_of_pieces, 'type' => $type, 'gross_weight' => $gross_weight, 'chargeable_weight' => $chargeable_weight], ['id_data_pieces' => $id_data_pieces, 'id_job_order' => $id_job_order]);

    echo json_encode(array("result" => "success"));
  }

  //Data Status
  public function add_jo_status(){
    $id_data_status = $this->uuid->v4();
    $id_job_order = $this->input->post("id_job");
    $date = $this->input->post("date_status");
    $time = $this->input->post("time");
    $status = $this->input->post("status");
    $note = $this->input->post("note");

    $this->db->insert("jo_data_status", [
      "id_data_status" => $id_data_status,
      "id_job_order" => $id_job_order,
      "date" => $date,
      "time" => $time,
      "status" => $status,
      "note" => $note
    ]);
    
    echo json_encode(array("result" => "success"));
  }

  public function del_jo_status(){
    $id_data_status = $this->input->post("data_status");

    $this->db->delete("jo_data_status", ['id_data_status' => $id_data_status]);

    echo json_encode(array("result" => "success"));
  }

  public function edit_jo_status(){
    $id_data_status = $this->input->post("data_status");
    $data = $this->db->get_where("jo_data_status", ['id_data_status' => $id_data_status]);
    if($data->num_rows() > 0){
      $result = "success";
      $status = $data->row_array();
    }
    else{
      $result = "failed";
      $status = "";
    }
    echo json_encode(array("result" => $result, "status" => $status));
  }

  public function update_jo_status(){
    $id_data_status = $this->input->post("id_data_status");
    $id_job_order = $this->input->post("id_job");
    $date = $this->input->post("date_status");
    $time = $this->input->post("time");
    $status = $this->input->post("status");
    $note = $this->input->post("note");

    $this->db->update("jo_data_status", ['date' => $date, 'time' => $time, 'status' => $status, 'note' => $note], ['id_data_status' => $id_data_status, 'id_job_order' => $id_job_order]);

    echo json_encode(array("result" => "success"));
  }

  //-------------------------Setting------------------------------

  public function setting()
  {
    // $id_quotation = $this->input->post('id');
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();

    $data['branch_office'] = $this->db->get_where('branch_office', ['idcompany' => $this->session->userdata("idcompany")])->result();
    $this->load->view('setting/cargo', $data);
    // echo $this->uuid->v4();
  }

  public function branch_office_adding(){
    $idcompany = $this->session->userdata("idcompany");
    $branch_id = $this->uuid->v4();
    $branch_office = $this->input->post("branch_office");
    $state = $this->input->post("state");
    $zip = $this->input->post("zip");

    $this->db->insert("branch_office", ['branch_id' => $branch_id, "idcompany" => $idcompany, "branch" => $branch_office, "state" => $state, "zip" => $zip]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function branch_office_edit(){
    $branch_id = $this->input->post("branch_id");
    $idcompany = $this->session->userdata("idcompany");

    $data = $this->db->get_where("branch_office", ['branch_id' => $branch_id, "idcompany" => $idcompany])->row_array();

    echo json_encode($data);
  }
  
  public function branch_office_update(){
    $branch_id = $this->input->post("branch_id");
    $idcompany = $this->session->userdata("idcompany");
    $branch_office = $this->input->post("branch_office");
    $state = $this->input->post("state");
    $zip = $this->input->post("zip");

    $this->db->update("branch_office", ['branch' => $branch_office, "state" => $state, "zip" => $zip], ['branch_id' => $branch_id, 'idcompany' => $idcompany]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function branch_office_delete(){
    $branch_id = $this->input->post("branch_id");
    $idcompany = $this->session->userdata("idcompany");

    $this->db->delete("branch_office", ['branch_id' => $branch_id, 'idcompany' => $idcompany]);

    $data= array("callback" => "yes");
    echo json_encode($data);
  }
//----------------------------------unit--------------------------------------------------------------------------
  function unity(){
    $idcompany = $this->session->userdata("idcompany");
    $data['all'] = $this->db->query("SELECT * FROM add_unit WHERE idcompany='$idcompany'")->result();
    $this->load->view('cargo/unit', $data);
  }
  function add_unity(){
		$one = $this->input->post("unit");
		$id_types = $this->uuid->v4();
		$idcompany = $this->session->userdata("idcompany");
		$all = array(
			'idunit' => $id_types,
			'idcompany' => $idcompany,
			'unit' => $one,
			'created_at' => date("Y-m-d")
		);
		$this->db->insert('add_unit', $all);
  }
  function get_data_status(){
		$get = $this->input->post('id');
		$ambil = $this->db->query("SELECT * FROM add_unit where idunit='$get' ")->row_array();
		$data = array(
			"inilah" => $ambil
		);
		echo json_encode($data);
  }
  function updated(){
		$name = $this->input->post("department_title");
		$idcategory = $this->input->post("get_idcategory");
		
		$this->db->query("UPDATE add_unit SET unit='$name' WHERE idunit='$idcategory' ");
  }
  function deleted(){
		$diambil = $this->input->post("id");
		$this->db->query("DELETE FROM add_unit WHERE idunit='$diambil'");

  }
  
  //----------------------------Item cost-----------------------------------------------------
  function item_cost(){
    $idcompany = $this->session->userdata("idcompany");
    $data['all'] = $this->db->query("SELECT * FROM add_itemcost WHERE idcompany='$idcompany'")->result();
    $this->load->view('cargo/item cost',$data);
  }
  function add_item(){
		$one = $this->input->post("new_category");
		$id_types = $this->uuid->v4();
		$idcompany = $this->session->userdata("idcompany");
		$all = array(
			'iditem' => $id_types,
			'idcompany' => $idcompany,
			'item' => $one,
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('add_itemcost', $all);
  }
  function get_data_item(){
		$get = $this->input->post('id');
		$ambil = $this->db->query("SELECT * FROM add_itemcost where iditem='$get' ")->row_array();
		$data = array(
			"inilah" => $ambil
		);
		echo json_encode($data);
  }
  function updated_item(){
		$name = $this->input->post("department_title");
		$idcategory = $this->input->post("get_idcategory");
// 		$all = array(
//                   'iditem' => $id_types,
//                   'idcompany' => $idcompany,
//                   'item' => $name,
//                   'created_at' => date("Y-m-d")
//                 );
//     $this->db->update('add_itemcost', $all);
        $this->db->query("UPDATE add_itemcost SET item='$name' WHERE iditem='$idcategory' ");
		
  }
  function deleted_item(){
		$diambil = $this->input->post("id");
		$this->db->query("DELETE FROM add_itemcost WHERE iditem='$diambil'");
  }

  //----------------------------Port-----------------------------------------------------
  public function port(){
    $idcompany = $this->session->userdata("idcompany");
    $data['all'] = $this->db->query("SELECT * FROM port WHERE idcompany='$idcompany'")->result();
    $this->load->view('cargo/port',$data);
  }
  function add_port(){
    $port = $this->input->post("port");
    $port_id = $this->uuid->v4();
    $idcompany = $this->session->userdata("idcompany");
    $country = $this->input->post("country");
    $deskripsi = $this->input->post("deskripsi");
    $all = array(
      'port_id' => $port_id,
      'idcompany' => $idcompany,
      'port' => $port,
      'country' => $country,
      'deskripsi' => $deskripsi,
      'created' => date("Y-m-d H:i:s")
    );
    $this->db->insert('port', $all);
  }
  function get_port(){
    $get = $this->input->post('id');
    $ambil = $this->db->query("SELECT * FROM port where port_id='$get' ")->row_array();
    $data = array(
      "inilah" => $ambil
    );
    echo json_encode($data);
  }
  function updated_port(){
    $port = $this->input->post("port");
    $port_id = $this->input->post("port_id");
    $country = $this->input->post("country");
    $deskripsi = $this->input->post("deskripsi");

    $save = $this->db->where(['port_id'=>$port_id])
                     ->update('port',[
                        'port'=>$port,
                        'country'=>$country,
                        'deskripsi'=>$deskripsi,
                      ]);
  }
  function deleted_port(){
    $diambil = $this->input->post("id");
    $this->db->query("DELETE FROM port WHERE port_id='$diambil'");
  }

  //----------------------------Airlines-----------------------------------------------------
  public function airlines(){
    $idcompany = $this->session->userdata("idcompany");
    $data['all'] = $this->db->query("SELECT * FROM airlines WHERE idcompany='$idcompany'")->result();
    $this->load->view('cargo/airlines',$data);
  }
  function add_airlines(){
    $airlines = $this->input->post("airlines");
    $id_airlines = $this->uuid->v4();
    $idcompany = $this->session->userdata("idcompany");
    $deskripsi = $this->input->post("deskripsi");
    $all = array(
      'id_airlines' => $id_airlines,
      'idcompany' => $idcompany,
      'airlines' => $airlines,
      'deskripsi' => $deskripsi,
      'created' => date("Y-m-d H:i:s")
    );
    $this->db->insert('airlines', $all);
  }
  function get_airlines(){
    $get = $this->input->post('id');
    $ambil = $this->db->query("SELECT * FROM airlines where id_airlines='$get' ")->row_array();
    $data = array(
      "inilah" => $ambil
    );
    echo json_encode($data);
  }
  function updated_airlines(){
    $airlines = $this->input->post("airlines");
    $id_airlines = $this->input->post("id_airlines");
    $deskripsi = $this->input->post("deskripsi");

    $save = $this->db->where(['id_airlines'=>$id_airlines])
                     ->update('airlines',[
                        'airlines'=>$airlines,
                        'deskripsi'=>$deskripsi,
                      ]);
  }
  function deleted_airlines(){
    $diambil = $this->input->post("id");
    $this->db->query("DELETE FROM airlines WHERE id_airlines='$diambil'");
  }

  //----------------------------Consignee-----------------------------------------------------
  public function consignee(){
    $idcompany = $this->session->userdata("idcompany");
    $data['all'] = $this->db->query("SELECT * FROM consignee WHERE idcompany='$idcompany'")->result();
    $this->load->view('cargo/consignee',$data);
  }
  function add_consignee(){
    $consignee = $this->input->post("consignee");
    $id_consignee = $this->uuid->v4();
    $idcompany = $this->session->userdata("idcompany");
    $deskripsi = $this->input->post("deskripsi");
    $all = array(
      'id_consignee' => $id_consignee,
      'idcompany' => $idcompany,
      'consignee' => $consignee,
      'deskripsi' => $deskripsi,
      'created' => date("Y-m-d H:i:s")
    );
    $this->db->insert('consignee', $all);
  }
  function get_consignee(){
    $get = $this->input->post('id');
    $ambil = $this->db->query("SELECT * FROM consignee where id_consignee='$get' ")->row_array();
    $data = array(
      "inilah" => $ambil
    );
    echo json_encode($data);
  }
  function updated_consignee(){
    $consignee = $this->input->post("consignee");
    $id_consignee = $this->input->post("id_consignee");
    $deskripsi = $this->input->post("deskripsi");

    $save = $this->db->where(['id_consignee'=>$id_consignee])
                     ->update('consignee',[
                        'consignee'=>$consignee,
                        'deskripsi'=>$deskripsi,
                      ]);
  }
  function deleted_consignee(){
    $diambil = $this->input->post("id");
    $this->db->query("DELETE FROM consignee WHERE id_consignee='$diambil'");
  }
}

  
?>