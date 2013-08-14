<?php
class InvoiceParticularEntryCollectionForm extends sfForm
{
  public function configure()
  {
   if (!$invoice = $this->getOption('invoice'))
   {
		//throw new InvalidArgumentException('You must provide a invoice object.');
   }
 
    for ($i = 0; $i < $this->getOption('size', 2); $i++)
    {
      $invoiceParticularEntry = new InvoiceParticularEntry();
      $invoiceParticularEntry->Invoice = $invoice;
 
      $form = new InvoiceParticularEntryForm($invoiceParticularEntry);
 
      $this->embedForm('gcross_'.$i, $form);
    }
  }
}
?>