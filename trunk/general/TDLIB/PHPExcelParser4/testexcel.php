<?php
error_reporting (E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
/****************************************************************
* Script       : test script for class BiffWriter
* Author       : Christian Novak - cnovak@gmx.net
* 
*
******************************************************************/
require_once("biff.php");

if (empty($submit)) { 
   echo '<form method=get action="testexcel.php">';
   echo '<h1>Create BiffWriter demo files:</h1><hr>';
   echo '1 <input type="radio" name="cmd" value="demo" checked>Create a generic demo file showing all functions<br>';
   echo '2 <input type="radio" name="cmd" value="class">Show class Source<br>';
   echo '3 <input type="radio" name="cmd" value="test">Show demo source<br>';
   echo '4 <input type="radio" name="cmd" value="numtest">Numeric boundary check file<br>';
   echo '5 <input type="radio" name="cmd" value="big">Create a huge file &gt; 4MB<br><br>';
   echo '6 <input type="checkbox" name="cr_file" value="true">Save to file, otherwise stream contents to browser: ';
   echo '<input type="text" name="fname" value="test.xls"><br>';
   echo '<input type="submit" name="submit" value="submit">';
   echo '</form>';
   echo '<hr><b>Notes:</b><br>The above will only work if the test script and biffwriter is an PHP enabled directory.<br>';
   echo 'Option 4 is <font color="#FF0000">important!!!</font> Please check that the created Excel file has the correct numbers!<br>';
   echo 'Option 5 will take some time depending on your server load. It creates 1000 rows x 256 columns filled with floating point numbers. The output file is > 4MB.<br>';
}
else {
   if (empty($cr_file)) {
      $fname = '';             
   }
	switch ($cmd) {
       case 'class' :
         highlight_file('biff.php');
         exit;
       case 'test' :
         highlight_file('testexcel.php');
         exit;
       case 'big' :
         /*
         ** here we call the base class with NO error checking, faster but 
         ** more dangerous. I.e. Excel crashed using a negative row or column.
         ** However, you need to supply all the arguments to each function, i.e.
         ** xlsWriteNumber(1, 1, 1.2345) is WRONG
         ** xlsWriteNumber(1, 1, 1.2345, 10, 0, FONT_0, ALIGN_RIGHT, 0) is CORRECT
         */
         BigFile(1000);
         break;
       case 'numtest' :
         Numtest();
         break;
		 case 'demo' :
         Demo();
    }
	 if (!empty($fname)) {
       print 'Get your file <a href="' .$fname. '">' .$fname. '</a>';
    }
}

/* 
* function to show all of the current capabilities
*/
function Demo() 
{
	global $fname;
   $myxls = new BiffWriter();
   $myxls->outfile = 'demo.xls';
   $myxls->xlsSetFont('Arial', 10, FONT_NORMAL);				// font 0
   $myxls->xlsSetFont('Arial', 10, FONT_BOLD);					// font 1
   $myxls->xlsSetFont('Courier New', 8, FONT_NORMAL);			// font 2
   $myxls->xlsSetFont('Courier New', 8, FONT_BOLD);			// font 3 
   $myxls->xlsSetDefRowHeight(14);                          // set default row height to 14 points
   $myxls->xlsSetBackup();												// set backup flag
   $myxls->xlsSetPrintGridLines();									// print grid lines
   $myxls->xlsSetPrintHeaders();                            // print row (1,2...) and col (A, B..) references
	$myxls->xlsProtectSheet('ABCD', TRUE);							// protect the sheet against changes, pw = ABCD
																				// all EMPTY cells AND cells having the status CELL_LOCKED are protected
   $myxls->xlsHeader('&12BiffWriter Demo (c) C. Novak - cnovak@gmx.net');		// print header
   $myxls->xlsFooter('&L&12Page &P of &N &C&D &T &R&F/&A');					// print footer
   $myxls->xlsPrintMargins(1, 1, 1, 1);										// print margin in inches
   $myxls->xlsAddHPageBreak(2);												// set a page break after row 2
   $myxls->xlsAddVPageBreak('C');												// set a page break before column C
   $myxls->xlsWriteText('A1', 0, 'BiffWriter Demo (c) C. Novak - cnovak@gmx.net', -1, 0, FONT_1, CELL_BOTTOM_BORDER, CELL_LOCKED);
   $myxls->xlsCellNote('A1', 0, 'This cell is protected with CELL_LOCKED. Notes can contain up to 2048 characters currently');
   $myxls->xlsWriteText('A2', 0, 'Biff 2.1 allows for up to 4 fonts having different attributes:',-1);
   $myxls->xlsWriteText('A3', 0, 'Arial', 0, 0, FONT_0, ALIGN_RIGHT);
   $myxls->xlsWriteText('A4', 0, 'Arial bold', 0, 0, FONT_1, ALIGN_RIGHT);
   $myxls->xlsWriteText('A5', 0, 'Courier', 0, 0, FONT_2, ALIGN_RIGHT);
   $myxls->xlsWriteText('A6', 0, 'Courier bold', 0, 0, FONT_3, ALIGN_RIGHT);
   $myxls->xlsWriteText('A7', 0, 'BIFF 2.1 comes with 21 predefined formats, custom formats can be added:',-1);
	$myxls->xlsCellNote('A7', 0, 'The cells below are set to "autowidth" and determine the width of column A');
	$idx_fmt = $myxls->xlsAddFormat('[Blue] 0 "US$"');
   for ($x = 0; $x < count($myxls->picture); $x++) {
      $myxls->xlsWriteText($x+7, 0, 'Format id ' .strval($x), 0, 0, FONT_2);
      $myxls->xlsWriteNumber($x+7, 1, 33333.3333, 20, $x, FONT_2);
      if (empty($myxls->picture[$x])) {
         $myxls->xlsWriteText($x+7, 2, 'predefined', 0, 0, FONT_2);
      }
      else {
          $myxls->xlsWriteText($x+7, 2, 'custom '. $myxls->picture[$x], 0, 0, FONT_3, CELL_BOX_BORDER);
      }
   }

   $myxls->xlsParse($fname);
   return;
} // end func

/*
* function to check numeric streams and boundaries, implemented after the huge 
* bug with floating point numbers, RUN THIS and VERIFY it is correct on your 
* Unix box!!!!!
*/
function Numtest() 
{
	global $fname;
   $myxls = new BiffWriter();
   $myxls->outfile = 'numtest.xls';
   $myxls->xlsWriteText(0,0, 'Largest allowed positive number 9.99999999999999E307 verify:', 60);
   $myxls->xlsWriteText(1,0, 'Smallest allowed negative number -9.99999999999999E307 verify:', -1);
   $myxls->xlsWriteText(2,0, 'Smallest allowed positive number 1E-307 verify:', -1);
   $myxls->xlsWriteText(3,0, 'Largest allowed negative number -1E-307 verify:', -1);
   $myxls->xlsWriteNumber(0,1, 9.99999999999999E307, 10);
   $myxls->xlsWriteNumber(1,1, -9.99999999999999E307);
   $myxls->xlsWriteNumber(2,1, 1E-307);
   $myxls->xlsWriteNumber(3,1, -1E-307);
   $myxls->xlsParse($fname);
   return;
}

/*
** function to check server load,
** mainly used to analyze and to improve execution time 
** of the biffwriter class. 
** Note that this function uses straight BiffBase
** 
*/
function BigFile($iter) 
{
	global $fname;
   $myxls = new BiffBase();
   $myxls->outfile = 'big.xls';
   set_time_limit(600);
   $x = 1;
   for ($r = 0 ; $r < $iter; $r++) {
      for ($c = 0; $c <= MAX_COLS; $c++ ) {
         $myxls->xlsWriteNumber($r, $c, $x++, 10, 0, FONT_0, ALIGN_RIGHT, 0);
      }
   }    
	$myxls->xlsParse($fname);
   return;
} // end func

?>