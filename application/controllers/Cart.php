<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{
    /**
     * Submit Cart
     * for Logged in User
     */
    public function add()
    {
        // Set Cart
        $stok = $this->input->post('id');
        $cart = $this->session->userdata('cart');
		print_r($cart);
		print_r('<hr>');
		print_r($stok);
        if(isset($stok)  && $stok != "") {
            if (count($cart)) {
                if (in_array($stok, $cart)) {
                    echo 0;
                    exit();
                } else {
                    array_push($cart, $stok);
                    $this->session->set_userdata('cart', $cart);
                    print_r($cart);
                    exit();
                }
            } else {
                $cart = array();
                array_push($cart, $stok);
                $this->session->set_userdata('cart', $cart);
                print_r($cart);
                exit();
			}
			print_r($cart);
			print_r($stok);
		}
    }


    /**
     * Submit Cart
     * for Logged in User
     */
    public function edit()
    {
        // Set Cart
        $stok = $this->input->post('stok_menu');
        $orderId = (string)$this->input->post('orderId').'-cart';
        $cart = $this->session->userdata($orderId);

        if(isset($stok)) {
            if (count($cart)) {
                if (in_array($stok, $cart)) {
                    echo 0;
                    exit();
                } else {
                    array_push($cart, $stok);
                    $this->session->set_userdata($orderId, $cart);
                    print_r($cart);
                    echo $orderId;
                    exit();
                }
            } else {
                $cart = array();
                array_push($cart, $stok);
                $this->session->set_userdata($orderId, $cart);
                print_r($cart);
                echo $orderId;
                exit();
            }
        }

    }


}
