<?php

class ProductController extends Controller
{
  public function index()
  {
    $data['title'] = 'Product List';
    // Misalnya, kita ingin menampilkan daftar produk
    $this->view('product/index', $data);
  }

  public function detail($id)
  {
    $data['title'] = 'Product Detail';
    // Anda dapat memuat model dan mendapatkan data produk berdasarkan ID
    $productModel = $this->model('ProductModel');
    $data['product'] = $productModel->getProductById($id);
    $this->view('product/detail', $data);
  }
}
