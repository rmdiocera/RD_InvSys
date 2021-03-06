<?php
class Transactions extends CI_Controller
{
    public function index()
    {
        $data['warehouses'] = $this->Warehouse_model->get_warehouses();
        $data['products'] = $this->Products_model->get_products();

        $this->load->view('includes/header');
        $this->load->view('transfer_stock', $data);
    }

    public function send_to_warehouse()
    {
        $from_warehouse = $this->input->post('from_warehouse');
        $to_warehouse = $this->input->post('to_warehouse');
        $product_id = $this->input->post('product_id');
        $quantity = $this->input->post('quantity');

        // Get row of selected product
        for ($i = 0; $i < count($product_id); $i++) {
            if (is_null($quantity[$i]) || !is_numeric($quantity[$i])) {
                redirect('transactions');
            } else {
                $product_details_from = $this->Warehouse_model->get_product_details_from($from_warehouse, $product_id[$i]);
                $product_details_to = $this->Warehouse_model->get_product_details_to($to_warehouse, $product_id[$i]);
                $warehouse_destination = $this->Warehouse_model->get_warehouse_destination($to_warehouse);

                // foreach ($product_details_from as $product_detail) {
                //     $from_warehouse_name = $product_detail->warehouse_name;
                // }

                // foreach ($product_details_to as $product_detail) {
                //     $to_warehouse_name = $product_detail->warehouse_name;
                // }

                // echo $from_warehouse_name." ".$to_warehouse_name;

                // Making changes to quantity from warehouse origin   
                foreach ($product_details_from as $product_detail) {
                    $current_quantity_from = $product_detail->quantity;
                    $from_warehouse_name = $product_detail->warehouse_name;
                }

                // Inserting or updating product to warehouse destination depending if $current_quantity_to is empty
                foreach ($product_details_to as $product_detail) {
                    $current_quantity_to = $product_detail->quantity;
                    // Variable commented due to conflicting errors,
                    // using $to_warehouse_name from $warehouse_destination instead.
                    // $to_warehouse_name = $product_detail->warehouse_name;
                }


                if ($from_warehouse === $to_warehouse) {
                    redirect('transactions');
                } else {
                    if ($quantity[$i] > $current_quantity_from) {
                        redirect('transactions');
                    } else {
                        $new_product_qty = $current_quantity_from - $quantity[$i];
                        $data = array(
                            'quantity' => $new_product_qty
                        );
                        $this->Warehouse_model->insert_new_quantity($data, $from_warehouse, $product_id[$i]);
                    }

                    foreach ($warehouse_destination as $warehouse_name) {
                        $to_warehouse_name = $warehouse_name->name;
                    }

                    if (empty($current_quantity_to)) {
                        //Insert new product with qty from input
                        $data = array(
                            'product_id' => $product_id[$i],
                            'warehouse_id' => $to_warehouse,
                            'quantity' => $quantity[$i]
                        );
                        $this->Warehouse_model->insert_new_product($data);

                        //Record transaction
                        $transaction = array(
                            'from_warehouse' => $from_warehouse_name,
                            'to_warehouse' => $to_warehouse_name,
                            'product_id' => $product_id[$i],
                            'quantity' => $quantity[$i]
                        );
                        $this->Warehouse_model->add_transaction($transaction);
                        // redirect('transactions');
                    } else {
                        //Update product qty
                        $new_product_qty = $current_quantity_to + $quantity[$i];
                        $data = array(
                            'quantity' => $new_product_qty
                        );
                        $this->Warehouse_model->update_product_quantity($data, $to_warehouse, $product_id[$i]);

                        //Record transaction
                        $transaction = array(
                            'from_warehouse' => $from_warehouse_name,
                            'to_warehouse' => $to_warehouse_name,
                            'product_id' => $product_id[$i],
                            'quantity' => $quantity[$i]
                        );
                        $this->Warehouse_model->add_transaction($transaction);

                        // redirect('transactions');
                    }
                }
            }
        }
        redirect('transactions');
    }
}
