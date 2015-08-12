<?php namespace Hyperized\Wefact;

class Attachment extends WefactAPI {

  protected $allowed = [
    'add',
    'delete',
    'download',
  ];

  /* Example documentation shows these as seperate functions while they
   * infact only re-use the existing pair of 'add', 'delete' & 'download'

  public function creditInvoiceAdd() {}
  public function creditInvoiceDelete() {}
  public function creditInvoiceDownload() {}
  public function creditorAdd() {}
  public function creditorDelete() {}
  public function creditorDownload() {}
  public function debtorAdd() {}
  public function debtorDelete() {}
  public function invoiceAdd() {}
  public function invoiceDelete() {}
  public function invoiceDownload() {}
  public function priceQuote() {}
  public function priceQuoteDelete() {}
  public function priceQuoteDownload() {}
  */

}
