<?php
/*
    How to use FPDF ----------------------------------------------
    1. AddPage(potrait/landscape, setting_pengukuran, besar_kertas);
    2. SetFont(family, style, size);
    3. Note : 1 Cell itu 1 baris
       - Cell(lebar, tinggi, text, border, new_line, align);
       - MultiCell(lebar, tinggi, text, border, align);
    4. SetMargins(left, top, right);

*/
    class Pdf_control extends CI_Controller{
        public function __construct(){
            parent::__construct();
            date_default_timezone_set("Asia/Jakarta");
            $this->api->CheckSession();
            qazwsxedc();

            $this->load->library(array("pdf", "pdf_textbox"));


        }
        
        public function quotation(){
            $id = $this->uri->segment(2);
            $checking = $this->db->get_where("quotation", ['id_quotation' => $id]);
            if($checking->num_rows() > 0){
                $data_quotation = $checking->row_array();

                //----- Data Collection------------
                $idcompany = $data_quotation['idcompany'];
                $customer = $data_quotation['customer'];
                $subject = $data_quotation['subject'];
                $number = $data_quotation['quote_number'];
                $date_quotation = $data_quotation['quote_date'];
                $shipping_from = $data_quotation['shipping_from'];
                $destination = $data_quotation['destination'];
                $expires_quotation = $data_quotation['expires_date'];
                $header = $data_quotation['desk_header'];
                $footer = $data_quotation['desk_footer'];

                //Company Data
                $data_company = $this->db->query("SELECT * FROM company JOIN address_company ON company.idcompany=address_company.idcompany WHERE company.idcompany='$idcompany'")->row_array();
                $company = $data_company['companyname'];
                $address = $data_company['addcompany'];
                $comphoto = $data_company['comphoto'];
                $notelp = $data_company['notelp'];
                $email = $data_company['email'];
                $website = $data_company['website'];

                //Destination Data
                $data_destination = $this->db->query("SELECT * FROM port WHERE port_id='$destination'")->row_array();
                $des_name = $data_destination['port'];

                //Branch Data
                $data_branch = $this->db->query("SELECT * FROM branch_office WHERE branch_id='$shipping_from'")->row_array();
                $branch_name = $data_branch['branch'];

                //Customer Data
                $data_customer = $this->db->query("SELECT * FROM contacts JOIN address_contacts ON contacts.idcontacts=address_contacts.idcontacts WHERE contacts.idcontacts='$customer'")->row_array();
                $cus_company = $data_customer['company'];
                $cus_first = $data_customer['first_name'];
                $cus_last = $data_customer['last_name'];
                // $cus_address = $data_customer['address'];
                $cus_email = $data_customer['email'];
                $phone_no = $data_customer['phone_no'];
                $photo = $data_customer['photo'];

                $pdf = new FPDF("P", "mm", "A4");

                $font = "Arial";
                //Adding Page
                $pdf->AddPage();
                //Set Margins
                $pdf->SetMargins(6, 4);
                //Set Title
                $pdf->SetTitle($company." - ".$number);

                //Set Font
                $pdf->SetFont($font, "B", 11);

                if (!empty($comphoto)) {
                $pdf->Image('assets/company/' . $comphoto,142.5,9,50,25);
                $pdf->Ln(27);
                //Set Right KOP
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(75, 3, $company, 0, "L");
                $pdf->SetFont($font, "", 8);
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 3, $address, 0, "L");
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 4, $email, 0, "L");
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 4, $notelp, 0, "L");
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 4, $website, 0, "L");
                }else{
                //Set Right KOP
                $pdf->Cell(131, 5, "", 0, 0);
                $pdf->MultiCell(50, 3, $company, 0, "L");
                $pdf->SetFont($font, "", 8);
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 3, $address, 0, "L");
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 4, $email, 0, "L");
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 4, $notelp, 0, "L");
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 4, $website, 0, "L");
                }
                //Add Space
                // $pdf->Cell(10,10, "", 0, 1);
                $pdf->Ln(10);

                $pdf->SetFont($font, "BI", 17);
                $pdf->Cell(190, 15, "QUOTATION", 0,1);

                //Data Quotation
                $pdf->SetFont($font, "B", 8);
                $pdf->Cell(150, 5, $cus_company, 0, 0);
                // $pdf->Cell(150, 5, $cus_address, 0, 0);
                
                //Date
                $pdf->SetFont($font, "", 8);
                $pdf->Cell(50, 5, "Date   :   ".$date_quotation, 0,1);

                //Quo No
                $pdf->Cell(145.5, 5, $cus_first." ".$cus_last, 0, 0);
                // $pdf->Cell(145.5, 5, "", 0, 0);
                $pdf->Cell(50, 5, "Quo. No   :   ".$number,0,1);

                //Valid Until
                $pdf->Cell(143.5, 5, $cus_email, 0, 0);
                $pdf->Cell(50, 5, "Valid Until   :   ".$expires_quotation,0,1);

                //Origin
                $pdf->Cell(148.5, 5, $phone_no, 0, 0);
                $pdf->Cell(50, 5, "Origin   :   ".$branch_name,0,1);

                //Destination
                $pdf->Cell(142, 5, "", 0, 0);
                $pdf->Cell(50, 5, "Destination   :   ".$des_name,0,1);

                $pdf->Cell(7, 5, "Re : ", 0, 0);
                $pdf->SetFont($font, "B", 8);

                if($subject == ""){
                    $pdf->MultiCell(190, 5, "Unkown Subject", 0);
                }
                else{
                    $pdf->MultiCell(190, 5, $subject, 0);
                }

                $pdf->SetFont($font, "", 8);
                if($header == ""){
                    $pdf->MultiCell(190, 5, "Firstly, we would to say thanks for kind cooperation and attention here with we would like to have to overing Quatation for as follow:",0);
                }
                else{
                    $pdf->MultiCell(190, 5, $header ,0);
                }
                

                //Set Space
                $pdf->Cell(10, 5, "", 0, 1);

                $pdf->SetFillColor(82,86,89);
                $pdf->SetFont($font, "B", 8);

                //Table header
                $pdf->Cell(6, 10, "No", 1, 0, "C");
                $pdf->Cell(50, 10, "Item", 1, 0, "C");
                $pdf->Cell(15, 10, "Unit", 1, 0, "C");
                $pdf->Cell(10, 10, "Qty", 1, 0, "C");
                $pdf->Cell(22, 10, "Rate", 1, 0, "C");
                $pdf->Cell(45,5, "Amount", 1, 0,"C");
                $pdf->Cell(48, 10, "NOTE", 1, 0, "C");
                $pdf->Cell(0, 5, "", 0, 1);
                $pdf->Cell(103, 5, "", 0, 0);
                $pdf->Cell(22.5, 5, "IDR", 1, 0, "C");
                $pdf->Cell(22.5, 5, "USD", 1, 1, "C");

                //Table Body
                $pdf->SetFont($font, "", 7);
                //Get Data Quotation Rate 
                $data_rate = $this->db->get_where("rate_quote", ['id_quotation' => $id])->result();
                $total_idr = 0;
                $total_usd = 0;
                $i = 1;
                foreach($data_rate as $row){
                    $pdf->Cell(6, 5, $i.".", 1, 0, "C");
                    //Item
                    $pdf->Cell(50, 5, $row->item_cost, 1,0, "L");
                    //Unit
                    $pdf->Cell(15, 5, $row->unit, 1, 0, "C");
                    //Qty
                    $pdf->Cell(10 ,5, number_format($row->qty,0,',','.'), 1, 0, "C");
                    //Rate
                    $pdf->Cell(22, 5, number_format($row->price,0,',','.'), 1, 0,"R");
                    //IDR
                    $pdf->Cell(22.5, 5, number_format($row->amount_idr,0,',','.'), 1, 0, "R");
                    //USD
                    $pdf->Cell(22.5, 5, number_format($row->amount_usd,0,',','.'), 1, 0, "R");
                    //Note
                    $pdf->MultiCell(48, 5, $row->note, 1, "L");

                    // $pdf->Cell(0, 5, "", 0, 1);
                    $i++;
                    $total_idr += $row->amount_idr;
                    $total_usd += $row->amount_usd;
                }

                //Table Footer
                $pdf->Cell(81, 5, "", 0,0);
                $pdf->SetFont($font, "B", 8);

                $pdf->Cell(22, 5, "Total:", 1, 0, "R");
                $pdf->Cell(22.5, 5, number_format($total_idr,0,',','.'), 1, 0, "R");
                $pdf->Cell(22.5, 5, number_format($total_usd,0,',','.'), 1, 1, "R");

                $pdf->Ln(3);

                $pdf->SetFont($font, "", 8);

                if($footer == ""){
                    $pdf->Cell(190, 5, "The requested term of payment are as follow: ", 0, 1);
                    $pdf->Cell(190, 5, "- 25% on contract date", 0, 1);
                    $pdf->Cell(190, 5, "- 50% on vessel arrival", 0, 1);
                    $pdf->Cell(190, 5, "- 25% after unstuffing/unpacking", 0, 1);

                    $pdf->Ln(3);
                    $pdf->Cell(190, 5, "Hope the above quotation will meet with your requirment and kindly please feel free contact us if any question.", 0, 1);
                }
                else{
                    $pdf->MultiCell(190, 5, $footer ,0);
                }

                $pdf->Ln(5);
                $pdf->Cell(190, 5, "Your Faithfully", 0, 1);
                $pdf->Cell(190, 5, $company, 0, 1);
                $pdf->Ln(15);
                $pdf->Cell(190, 5, "Administrator", 0, 0);

                //Print PDF
                $fileName = $company . ' - ' . $number . '.pdf';
                $pdf->Output($fileName, 'D');
            }
            else{
                redirect("quotation");
            }
        }

        public function job_order(){
            $id_jo = $this->uri->segment(2);
            $checking = $this->db->get_where("job_order", ['id_job_order' => $id_jo]);
            if($checking->num_rows() > 0){
                $data_job_order = $checking->row_array();
                //-------------- Set Table Header Color ---------
                $table_red_fill_color = 232;
                $table_green_fill_color = 232;
                $table_blue_fill_color = 232;
                
                // ------------- Data Collection -----------------
                $id_quotation = $data_job_order['id_quotation'];
                $idcompany = $data_job_order['idcompany'];
                $jo_number = $data_job_order['jo_number'];
                $jo_date = $data_job_order['jo_date'];
                $jo_type = $data_job_order['jo_type'];
                $freight_type = $data_job_order['freight_type'];

                //Job Order Data
                $data_jo = $this->db->get_where("jo_data", ['id_job_order' => $id_jo])->row_array();
                $port_of_loading = $data_jo['loading'];
                $port_of_discharge = $data_jo['discharge'];
                $port_of_delivery = $data_jo['delivery'];
                $port_of_receive = $data_jo['receive'];
                $shipper_name = $data_jo['shipper'];
                $consignee_name = $data_jo['consignee'];
                $notify_party_name = $data_jo['notify_party'];
                $agent_name = $data_jo['agent'];
                $hs_code = $data_jo['hs_code'];
                $desc_of_goods = $data_jo['deskripsi'];
                $etd = $data_jo['etd'];
                $eta = $data_jo['eta'];
                $stuffing_date = $data_jo['stuffing'];


                //Data Sea
                $data_sea = $this->db->get_where("jo_data_sea", ['id_job_order' => $id_jo])->row_array();
                $shipment_number = $data_sea['shipment_number'];
                $hbl = $data_sea['bl_number'];
                $mbl = $data_sea['mbl_number'];
                $feeder = $data_sea['voyage'];
                $vessel = $data_sea['vessel'];
                
                //Data Company
                $data_company = $this->db->get_where("company", ['idcompany' => $idcompany])->row_array();
                $data_add_company = $this->db->get_where("address_company", ['idcompany' => $idcompany])->row_array();
                $company_name = $data_company['companyname'];
                $company_add = $data_add_company['addcompany'];

                //Data Quotation
                $data_quotation = $this->db->get_where("quotation", ['id_quotation' => $id_quotation])->row_array();
                $quotation_number = $data_quotation['quote_number'];
                $customer_name = $data_quotation['customer_name'];
                $quotation_subject = $data_quotation['subject'];


                $pdf = new PDF_TextBox("P", "mm", "A4");
                $pdf->AliasNbPages();

                //Set Title
                $pdf->SetTitle($jo_number." - ".$company_name);
                //Set Font
                $font = "Arial";
                
                //--------------------------------- First Page / JOB SHEET ---------------------------
                //Adding Page\

                $pdf->AddPage();
                //Set Margins
                $pdf->SetMargins(6, 4);

                //Set Font
                $pdf->SetFont($font, "B", 11);

                //Set Right KOP
                $pdf->Cell(131, 5, "", 0, 0);
                $pdf->MultiCell(50, 3, $company_name, 0, "L");
                $pdf->SetFont($font, "", 8);
                //Add Space
                $pdf->Cell(135, 5, "", 0, 0);
                $pdf->MultiCell(50, 3, $company_add, 0, "L");

                //Add Space
                // $pdf->Cell(10,10, "", 0, 1);
                $pdf->Ln(10);

                $pdf->SetFont($font, "B", 15);
                $pdf->Cell(181, 5, "JOB  SHEET", 0, 1, "L");
                
                $pdf->Ln(5);

                $pdf->SetFont($font, "", 8);

                //Jo. Number
                $pdf->Cell(20, 5, "Jo. Number", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(100, 5, $jo_number, 0, 0);

                //Quo. Number
                $pdf->Cell(20, 5, "Quo. Number", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(50, 5, $quotation_number, 0, 1);

                //Jo. Date
                $pdf->Cell(20, 5, "Jo. Date", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(100, 5, $jo_date, 0, 0);

                //Customer
                $pdf->Cell(20, 5, "Customer", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(50, 5, $customer_name, 0, 1);

                //Jo. Type
                $pdf->Cell(20, 5, "Jo. Type", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(100, 5, $jo_type, 0, 0);

                //Subject
                $pdf->Cell(20, 5, "Subject", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(50, 5, $quotation_subject, 0, 1);

                $pdf->Ln(5);
                
                //Box
                $set_x = 13;
                $set_y = 70;
                $pdf->drawTextBox('', 198, 70);
                
                $pdf->SetXY($set_x, $set_y);

                //SI. Number
                $pdf->Cell(25, 5, "SI. Number", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(70, 5, $shipment_number, 0, 0);

                //Port of Loading
                $pdf->Cell(25, 5, "Port of Loading", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $port_of_loading, 0, 1);

                $pdf->SetXY($set_x, $set_y+5);

                //Shipper Name
                $pdf->Cell(25, 5, "Shipper Name", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(70, 5, $shipper_name, 0, 0);

                //Port of Discharge
                $pdf->Cell(25, 5, "Port of Discharge", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $port_of_discharge, 0, 1);

                $pdf->SetXY($set_x, $set_y+10);

                //Consignee Name
                $pdf->Cell(25, 5, "Consignee Name", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(70, 5, $consignee_name, 0, 0);

                //Port of Delivery
                $pdf->Cell(25, 5, "Port of Delivery", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $port_of_delivery, 0, 1);

                $pdf->SetXY($set_x, $set_y+15);

                //Notify Party
                $pdf->Cell(25, 5, "Notify Party", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(70, 5, $notify_party_name, 0, 0);

                //Port of Receive
                $pdf->Cell(25, 5, "Port of Receive", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $port_of_receive, 0, 1);

                $pdf->SetXY($set_x, $set_y+20);

                //Agent Name
                $pdf->Cell(25, 5, "Agent Name", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(70, 5, $agent_name, 0, 0);

                //ETD
                $pdf->Cell(25, 5, "ETD", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $etd, 0, 1);

                $pdf->SetXY($set_x, $set_y+25);

                //HS. Code
                $pdf->Cell(25, 5, "HS. Code", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(70, 5, $hs_code, 0, 0);

                //ETA
                $pdf->Cell(25, 5, "ETA", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $eta, 0, 1);

                $pdf->SetXY($set_x, $set_y+30);

                //Desc of Goods
                $pdf->Cell(25, 5, "Desc of Goods", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->MultiCell(70, 5, $desc_of_goods, 0);

                $pdf->SetXY($set_x+98, $set_y+30);

                //Stuffing Date
                $pdf->Cell(25, 5, "Stuffing Date", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $stuffing_date, 0, 1);

                $pdf->SetXY($set_x+98, $set_y+35);

                //HBL
                $pdf->Cell(25, 5, "HBL", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $hbl, 0, 1);
                
                $pdf->SetXY($set_x+98, $set_y+40);

                //MBL
                $pdf->Cell(25, 5, "MBL", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $mbl, 0, 1);

                $pdf->SetXY($set_x+98, $set_y+45);

                //Feeder
                $pdf->Cell(25, 5, "Feeder", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $feeder, 0, 1);

                $pdf->SetXY($set_x+98, $set_y+50);

                //Vessel
                $pdf->Cell(25, 5, "Vessel", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(60, 5, $vessel, 0, 1);

                $pdf->SetXY(5, $set_y+70);
                $pdf->SetFont($font, "B", 8);
                $pdf->Cell(190, 5, "DATA CONTAINER/TRUCK", 0, 1);

                $pdf->SetFont($font, "", 8);

                $pdf->SetFillColor($table_red_fill_color, $table_green_fill_color, $table_blue_fill_color);
                $pdf->Cell(30, 5, "CONT/TRUCT NO", 1, 0, "C", true);
                $pdf->Cell(20, 5, "TYPE", 1, 0, "C", true);
                $pdf->Cell(30, 5, "MEASUREMENT", 1, 0, "C", true);
                $pdf->Cell(25, 5, "NET WEIGHT", 1, 0, "C", true);
                $pdf->Cell(25, 5, "GROSS WEIGHT", 1, 1, "C", true);

                $data_container = $this->db->get_where("jo_data_container", ['id_job_order' => $id_jo])->result();
                foreach($data_container as $row){
                    $pdf->Cell(30, 5, $row->container_number, 1, 0, "C");
                    $pdf->Cell(20, 5, $row->type, 1, 0, "C");
                    $pdf->Cell(30, 5, number_format($row->measurement,0,',','.'), 1, 0, "C");
                    $pdf->Cell(25, 5, number_format($row->net_weight,0,',','.'), 1, 0, "C");
                    $pdf->Cell(25, 5, number_format($row->gross_weight,0,',','.'), 1, 1, "C");
                }

                //--------------------------------- Second Page / DAILY REPORT ---------------------------            
                //Adding Page
                $pdf->AddPage();
                //Set Margins
                $pdf->SetMargins(6, 4);
                $pdf->SetFont($font, "B", 14);
                $pdf->Ln(30);

                //Header
                $pdf->Cell(198, 5, "DAILY REPORT", 0, 1, "C");
                $pdf->SetFont($font, "B", 8);
                $pdf->Cell(198, 5, $jo_number, 0, 1, "C");

                $pdf->Ln(5);
                
                //SI. Number
                $pdf->SetFont($font, "", 8);
                $pdf->Cell(30, 5, "SI. Number", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(80, 5, $shipment_number, 0, 0);

                //Agent
                $pdf->Cell(23, 5, "Agent", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(58, 5, $agent_name, 0, 1);

                //Customer Name
                $pdf->Cell(30, 5, "Customer Name", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(80, 5, $customer_name, 0, 0);

                //Port of Loading
                $pdf->Cell(23, 5, "Port of Loading", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(58, 5, $port_of_loading, 0, 1);

                //Vessel/Flight
                $pdf->Cell(30, 5, "Vessel/Flight", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(80, 5, $vessel, 0, 0);

                //Port of Discharge
                $pdf->Cell(23, 5, "Port of Discharge", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(58, 5, $port_of_discharge, 0, 1);

                //No. MBL/MAWB
                $pdf->Cell(30, 5, "No. MBL/MAWB", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(80, 5, $mbl, 0, 0);

                //ETD
                $pdf->Cell(23, 5, "ETD", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(58, 5, $etd, 0, 1);

                //No. HBL/HAWB
                $pdf->Cell(30, 5, "No. HBL/HAWB", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(80, 5, $hbl, 0, 0);

                //ETA
                $pdf->Cell(23, 5, "ETA", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(58, 5, $eta, 0, 1);

                //Desc of Goods
                $pdf->Cell(30, 5, "Desc of Goods", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(80, 5, $desc_of_goods, 0, 0);

                // $pdf->SetXY(119, 74);
                //Stuffing
                $pdf->Cell(23, 5, "Stuffing", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(58, 5, $stuffing_date, 0, 1);
                
                $pdf->Ln(10);

                $pdf->SetFont($font, "B", 8);
                // $pdf->SetFillColor($table_red_fill_color, $table_green_fill_color, $table_blue_fill_color);
                $pdf->Cell(20, 5, "Date", 1, 0, "C", true);
                $pdf->Cell(15, 5, "Time", 1, 0, "C", true);
                $pdf->Cell(25, 5, "Status", 1, 0, "C", true);
                $pdf->Cell(138, 5, "Note", 1, 1, "C", true);

                $pdf->SetFont($font, "", 8);
                $data_status = $this->db->get_where("jo_data_status", ['id_job_order' => $id_jo])->result();
                foreach($data_status as $row){
                    $pdf->Cell(20, 5, $row->date, 1, 0, "C");
                    $pdf->Cell(15, 5, $row->time, 1, 0, "C");
                    $pdf->Cell(25, 5, $row->status, 1, 0, "C");
                    $pdf->Cell(138, 5, $row->note, 1, 1);
                }

                //----------------------------- Seventh Page / JO GROSS PROFIT -----------------------
                //Adding Page
                $pdf->AddPage();
                //Set Margins
                $pdf->SetMargins(6, 4);

                //Add Space
                // $pdf->Cell(10,10, "", 0, 1);
                $pdf->Ln(10);

                $pdf->SetFont($font, "B", 15);
                $pdf->Cell(181, 5, "JO GROSS PROFIT", 0, 1, "L");

                $pdf->Ln(5);
                $pdf->SetFont($font, "", 8);

                //Jo. Number
                $pdf->Cell(23, 5, "Jo. Number", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(50, 5, $jo_number, 0, 0);

                //Vessel
                $pdf->Cell(20, 5, "Vessel", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(45, 5, $vessel, 0, 0);

                //ETD
                $pdf->Cell(10, 5, "ETD", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(42, 5, $etd, 0, 1);

                //Jo. Date
                $pdf->Cell(23, 5, "Jo. Date", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(50, 5, $jo_date, 0, 0);

                //Carrier
                $pdf->Cell(20, 5, "Carrier", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(45, 5, $feeder, 0, 0);

                //ETA
                $pdf->Cell(10, 5, "ETA", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(42, 5, $eta, 0, 1);

                //Jo. Type
                $pdf->Cell(23, 5, "Jo. Type", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(50, 5, $jo_type, 0, 0);

                //HBL
                $pdf->Cell(20, 5, "HBL", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(45, 5, $hbl, 0, 0);

                //POL
                $pdf->Cell(10, 5, "POL", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(42, 5, $port_of_discharge, 0, 1);

                //Customer Name
                $pdf->Cell(23, 5, "Customer Name", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(50, 5, $customer_name, 0, 0);

                //HBL
                $pdf->Cell(20, 5, "MBL", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(45, 5, $mbl, 0, 0);

                //POL
                $pdf->Cell(10, 5, "POD", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(42, 5, $port_of_loading, 0, 1);

                //Agent Name
                $pdf->Cell(23, 5, "Agent Name", 0, 0);
                $pdf->Cell(3, 5, ":", 0, 0);
                $pdf->Cell(50, 5, $agent_name, 0, 1);

                $pdf->Ln(5);
                
                //Reveivable Table
                $pdf->SetFont($font, "B", 8);
                $pdf->Cell(50, 5, "RECEIVABLE", 0, 1);

                $pdf->SetFont($font, "", 8);

                $pdf->SetFillColor($table_red_fill_color, $table_green_fill_color, $table_blue_fill_color);
                $pdf->Cell(10, 10, "NO", 1, 0, "C", true);
                $pdf->Cell(100, 10, "DESCRIPTION", 1, 0, "C", true);
                $pdf->Cell(12, 10, "QTY", 1, 0, "C", true);
                $pdf->Cell(25, 10, "PRICE", 1, 0, "C", true);
                $pdf->Cell(50,5, "Amount", 1, 0,"C", true);
                $pdf->Cell(0, 5, "", 0, 1);
                $pdf->Cell(147, 5, "", 0, 0);
                $pdf->Cell(27.5, 5, "IDR", 1, 0, "C", true);
                $pdf->Cell(22.5, 5, "USD", 1, 1, "C", true);

                $data_rate_quote = $this->db->get_where("rate_quote", ['id_quotation' => $id_quotation])->result();
                $i = 1;
                $total_receivable_idr = 0;
                $total_receivable_usd = 0;
                foreach($data_rate_quote as $row){
                    
                    $pdf->Cell(10,5, $i, 1, 0, "C");
                    $pdf->Cell(100, 5, $row->item_cost, 1, 0, "L");
                    $pdf->Cell(12, 5, $row->qty, 1, 0, "C");
                    $pdf->Cell(25, 5, number_format($row->price, 0, ',','.'), 1, 0, "R");
                    $pdf->Cell(27.5, 5, number_format($row->amount_idr, 0,',','.'), 1, 0, "R");
                    $pdf->Cell(22.5, 5, number_format($row->amount_usd, 0,',','.'), 1, 1, "R");

                    $total_receivable_idr += $row->amount_idr;
                    $total_receivable_usd += $row->amount_usd;
                    $i++;
                }

                $pdf->Cell(147, 5, "", 0, 0);
                $pdf->SetFont($font, "B", 8);
                $pdf->Cell(27.5, 5, number_format($total_receivable_idr, 0, ',','.'), 1, 0, "R");
                $pdf->Cell(22.5, 5, number_format($total_receivable_usd, 0, ',','.'), 1, 1, "R");

                //Cost Table
                $pdf->Ln(5);
                $pdf->Cell(50, 5, "COST", 0, 1);
                $pdf->SetFont($font, "", 8);
                $pdf->SetFillColor($table_red_fill_color, $table_green_fill_color, $table_blue_fill_color);
                $pdf->Cell(10, 10, "NO", 1, 0, "C", true);
                $pdf->Cell(50, 10, "DESCRIPTION", 1, 0, "C", true);
                $pdf->Cell(50, 10, "VENDOR", 1, 0, "C", true);
                $pdf->Cell(12, 10, "QTY", 1, 0, "C", true);
                $pdf->Cell(25, 10, "PRICE", 1, 0, "C", true);
                $pdf->Cell(50,5, "Amount", 1, 0,"C", true);
                $pdf->Cell(0, 5, "", 0, 1);
                $pdf->Cell(147, 5, "", 0, 0);
                $pdf->Cell(27.5, 5, "IDR", 1, 0, "C", true);
                $pdf->Cell(22.5, 5, "USD", 1, 1, "C", true);

                $data_cost = $this->db->get_where("estimation_cost", ['id_quotation' => $id_quotation])->result();
                $total_cost_idr = 0;
                $total_cost_usd = 0;

                $i = 1;
                foreach($data_rate_quote as $row){
                    $pdf->Cell(10,5, $i, 1, 0, "C");
                    $pdf->Cell(50, 5, $row->item_cost, 1, 0, "L");
                    $pdf->Cell(50, 5, "NA",1, 0, "L");
                    $pdf->Cell(12, 5, $row->qty, 1, 0, "C");
                    $pdf->Cell(25, 5, number_format($row->price, 0, ',','.'), 1, 0, "R");
                    $pdf->Cell(27.5, 5, number_format($row->amount_idr, 0,',','.'), 1, 0, "R");
                    $pdf->Cell(22.5, 5, number_format($row->amount_usd, 0,',','.'), 1, 1, "R");
                    $i++;
                }

                foreach($data_cost as $row){
                    $pdf->Cell(10,5, $i, 1, 0, "C");
                    $pdf->Cell(50, 5, $row->item_cost, 1, 0, "L");
                    $pdf->Cell(50, 5, $row->vendor, 1, 0, "L");
                    $pdf->Cell(12, 5, $row->qty, 1, 0, "C");
                    $pdf->Cell(25, 5, number_format($row->price, 0, ',','.'), 1, 0, "R");
                    $pdf->Cell(27.5, 5, number_format($row->amount_idr, 0,',','.'), 1, 0, "R");
                    $pdf->Cell(22.5, 5, number_format($row->amount_usd, 0,',','.'), 1, 1, "R");

                    $total_cost_idr += $row->amount_idr;
                    $total_cost_usd += $row->amount_usd;
                    $i++;
                }

                $pdf->Cell(147, 5, "", 0, 0);
                $pdf->SetFont($font, "B", 8);
                $pdf->Cell(27.5, 5, number_format($total_cost_idr + $total_receivable_idr, 0, ',','.'), 1, 0, "R");
                $pdf->Cell(22.5, 5, number_format($total_cost_usd + $total_receivable_usd, 0, ',','.'), 1, 1, "R");

                $pdf->Ln(10);

                $pdf->SetFont($font, "", 8);
                $pdf->Cell(137, 5, "NOTES",1, 0, "C");
                $pdf->Cell(30, 5, "PROFIT IDR", 1, 0, "C");
                $pdf->Cell(30, 5, "PROFIT USD", 1, 1, "C");
                $pdf->SetFont($font, "B", 10);
                $pdf->Cell(137, 15, "", 1, 0);
                $pdf->Cell(30, 15, number_format($total_receivable_idr - $total_cost_idr, 0, ',','.'), 1, 0, "C");
                $pdf->Cell(30, 15, number_format($total_receivable_usd - $total_cost_usd, 0, ',','.'), 1, 1, "C");

                $pdf->Output();
                
            }
            else{
                redirect("job-order");
            }
        }
    }
?>