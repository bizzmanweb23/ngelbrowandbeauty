<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Invoice</title>
	<style type="text/css">
		table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}
			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}
			tr:nth-child(even) {
			  background-color: #dddddd;
			}
			img{
				max-width: 50px; height: auto; display: block;
			}
	</style>
</head>
<body>
<div id="container">
	<h1>n'gel Brow & Beauty</h1>
	<div id="body">	
		<table >
			<tr>
				<th>no</th>
				<th>product name</th>
				<th>quantity</th>
				<th>Product price</th>
				<th>Total price</th>
			</tr>
			<tbody>
				<?php foreach ($invoiceData as $invoiceDataRow) {?>
					<tr>	
						<td><?= $invoiceDataRow['order_number'];?></td>
						<td><?= $invoiceDataRow['product_name'];?></td>
						<td><?= $invoiceDataRow['total_quantity'];?></td>
						<td><?= $invoiceDataRow['product_price'];?></td>
						<td><?= $invoiceDataRow['total_price'];?></td>
					</tr>	
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>-->



<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
	</head>
	
	<style>

	*
	{
		border: 0;
		box-sizing: content-box;
		color: inherit;
		font-family: inherit;
		font-size: inherit;
		font-style: inherit;
		font-weight: inherit;
		line-height: inherit;
		list-style: none;
		margin: 0;
		padding: 0;
		text-decoration: none;
		vertical-align: top;
	}

	/* content editable */

	*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

	*[contenteditable] { cursor: pointer; }

	*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

	span[contenteditable] { display: inline-block; }

	/* heading */

	h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

	/* table */

	table { font-size: 75%; table-layout: fixed; width: 100%; }
	table { border-collapse: separate; border-spacing: 2px; }
	th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
	th, td { border-radius: 0.25em; border-style: solid; }
	th { background: #EEE; border-color: #BBB; }
	td { border-color: #DDD; }

	/* page */

	html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
	html { background: #999; cursor: default; }

	body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
	body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

	/* header */

	header { margin: 0 0 3em; }
	header:after { clear: both; content: ""; display: table; }

	header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
	header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
	header address p { margin: 0 0 0.25em; }
	header span, header img { display: block; float: right; }
	header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
	header img { max-height: 100%; max-width: 100%; }
	header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

	/* article */

	article, article address, table.meta, table.inventory { margin: 0 0 3em; }
	article:after { clear: both; content: ""; display: table; }
	article h1 { clip: rect(0 0 0 0); position: absolute; }

	article address { float: left; font-size: 125%; font-weight: bold; }

	/* table meta & balance */

	table.meta, table.balance { float: right; width: 36%; }
	table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

	/* table meta */

	table.meta th { width: 40%; }
	table.meta td { width: 60%; }

	/* table items */

	table.inventory { clear: both; width: 100%; }
	table.inventory th { font-weight: bold; text-align: center; }

	table.inventory td:nth-child(1) { width: 26%; }
	table.inventory td:nth-child(2) { width: 38%; }
	table.inventory td:nth-child(3) { text-align: right; width: 12%; }
	table.inventory td:nth-child(4) { text-align: right; width: 12%; }
	table.inventory td:nth-child(5) { text-align: right; width: 12%; }

	/* table balance */

	table.balance th, table.balance td { width: 50%; }
	table.balance td { text-align: right; }

	/* javascript */

	@media print {
		* { -webkit-print-color-adjust: exact; }
		html { background: none; padding: 0; }
		body { box-shadow: none; margin: 0; }
		span:empty { display: none; }
	}

	@page { margin: 0; }
	</style>
	<body>
		<header>
			<h1>Invoice</h1>
			<address contenteditable>
				<p>Jonathan Neal</p>
				<p>101 E. Chapman Ave<br>Orange, CA 92866</p>
				<p>(800) 555-1234</p>
			</address>
			<span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p>Some Company<br>c/o Some Guy</p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable>101138</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable>January 1, 2012</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Order No.</span></th>
						<th><span contenteditable>Product Name</span></th>
						<th><span contenteditable>Unit Price</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Total Price</span></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($invoiceData as $invoiceDataRow) {?>
					<tr>
						<td><span contenteditable><?= $invoiceDataRow['order_number'];?></span></td>
						<td><span contenteditable><?= $invoiceDataRow['product_name'];?></span></td>
						<td><span data-prefix>$</span><span contenteditable><?= $invoiceDataRow['total_quantity'];?></span></td>
						<td><span contenteditable><?= $invoiceDataRow['product_price'];?></span></td>
						<td><span data-prefix>$</span><span><?= $invoiceDataRow['total_price'];?></span></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<table class="balance" style="float: right; width: 36%;">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>$</span><span contenteditable>0.00</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Balance Due</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
			</table>
		</article>
	</body>
</html>
