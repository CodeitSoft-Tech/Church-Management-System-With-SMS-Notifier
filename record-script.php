<?php

	include('includes/db_conn.php');

    function ShowMembers()
	{
		 global $db;

		  // Total Members
	     $select_member = "SELECT * FROM members_tbl";

	     $run_member    = mysqli_query($db, $select_member);

	     $count_member  = mysqli_num_rows($run_member);

	     echo $count_member;

	}

    function ShowMinistry()
	{
		global $db;

		// Total Ministries
        $tot_min   = "SELECT * FROM ministry_tbl";

        $run_min   = mysqli_query($db, $tot_min);

        $count_min = mysqli_num_rows($run_min);

        echo $count_min;

	}

   function ShowGroup()
	{
		global $db;

		// Total Groups
     	$tot_grp   = "SELECT * FROM group_tbl";

     	$run_grp   = mysqli_query($db, $tot_grp);

     	$count_grp = mysqli_num_rows($run_grp);

     	echo $count_grp;

	}


   function ShowDonation()
	{
		global $db;

		  // Total Donation
        $tot_don   = "SELECT * FROM donation_tbl";

        $run_don   = mysqli_query($db, $tot_don);

        $count_don = mysqli_num_rows($run_don);

        echo $count_don;

	}

    
	function ShowDonationAmt()
	{
			 global $db;

			 // Total Donation Amount
		     $tot_don   = "SELECT * FROM donation_tbl";
		     $run_don   = mysqli_query($db, $tot_don);

		     $don_amt = 0;

		     while($row_don   = mysqli_fetch_array($run_don))
		     {
		        $don_amt += $row_don['amount'];

		     }

		     $count_don_amt = number_format($don_amt, 2);
		     echo $count_don_amt;            
	}

	function ShowPledges()
	{
			global $db;

            // Total Pledges
		    $tot_pgd   = "SELECT * FROM pledges_tbl";

		    $run_pgd   = mysqli_query($db, $tot_pgd);

		    $count_pgd = mysqli_num_rows($run_pgd);
      
        	echo $count_pgd; 
  
            
	}


	function ShowEvent()
	{
			global $db;

             // Total Events
		    $tot_event   = "SELECT * FROM events_tbl";

		    $run_event   = mysqli_query($db, $tot_event);

		    $count_event = mysqli_num_rows($run_event);
        	
        	echo $count_event;
            
	}


	function ShowPledgesAmt()
	{
			 global $db;
            
             // Total Pledges Amount
		     $pgd_amt = 0;
		     $tot_pgd   = "SELECT * FROM pledges_tbl";
		     $run_pgd   = mysqli_query($db, $tot_pgd);
		     while($row_pgd   = mysqli_fetch_array($run_pgd))
		     {
		        $pgd_amt += $row_pgd['pledge_amt'];
		     }
		     $count_pgd_amt = number_format($pgd_amt, 2);
             echo $count_pgd_amt;
   
	}

	function ShowUpEvent()
	{
			global $db;

			// Total Upcoming Event
		    $tot_event   = "SELECT * FROM events_tbl WHERE event_status = 'Upcoming'";

		    $run_event   = mysqli_query($db, $tot_event);

		    $count_upevent = mysqli_num_rows($run_event);

		    echo $count_upevent;
	}

	function ShowOnEvent()
	{
			global $db;

			// Total Ongoing Event
		    $tot_event   = "SELECT * FROM events_tbl WHERE event_status = 'Ongoing'";

		    $run_event   = mysqli_query($db, $tot_event);

		    $count_onevent = mysqli_num_rows($run_event);

		    echo $count_onevent;
	}


	function ShowOverallAmt()
	{
		global $db;

		$query   = "SELECT * FROM income_tbl";
		$run_inc = mysqli_query($db, $query);

		$inc_amt = 0;
        $tax_amt = 0;
		while($row_inc = mysqli_fetch_array($run_inc))
        {
            $inc_amt += $row_inc['income_amt'];
            $tax_amt += $row_inc['income_tax'];
         }

        $overall_inc_amt = number_format(($inc_amt - $tax_amt), 2);
        echo $overall_inc_amt; 

	}


	function ShowIncAmt()
	{
		global $db;

		   // Total Income Amount
	    
	     $tot_inc   = "SELECT * FROM income_tbl";
	     $run_inc   = mysqli_query($db, $tot_inc);
	     $inc_amt = 0;
	     while($row_inc = mysqli_fetch_array($run_inc))
	     {
	        $inc_amt += $row_inc['income_amt'];

	     }
	     $count_inc_amt = number_format($inc_amt, 2);
	     echo $count_inc_amt;

	}


	function ShowIncTax()
	{
		 global $db;

		 // Total Income Tax
	     $tot_tax   = "SELECT * FROM income_tbl";
	     $run_tax   = mysqli_query($db, $tot_tax);
	     $tax_amt = 0;
	     while($row_tax = mysqli_fetch_array($run_tax))
	     {
	        $tax_amt += $row_tax['income_tax'];

	     }
	     $count_tax_amt = number_format($tax_amt, 2);
	     
	     echo $count_tax_amt;       

	}

	
	function ShowExpenses()
	{
		 global $db;

		 // Total Expenses 
	     $tot_exp   = "SELECT * FROM tbl_expenses";
	     $run_exp   = mysqli_query($db, $tot_exp);
	     $exp_amt = 0;
	     while($row_exp = mysqli_fetch_array($run_exp))
	     {
	        $exp_amt += $row_exp['expense_amount'];
	     }
	     
	     $count_exp_amt = number_format($exp_amt, 2);
	     echo $count_exp_amt;

	}


	function ShowMainOffertory()
	{
		 global $db;

		 // Total Expenses 
	     $tot_mo   = "SELECT * FROM main_offertory";
	     $run_mo   = mysqli_query($db, $tot_mo);
	     $mo_amt   = 0;
	     while($row_mo = mysqli_fetch_array($run_mo))
	     {
	        $mo_amt += $row_mo['offertory_amt'];
	     }
	     
	     $count_mo_amt = number_format($mo_amt, 2);
	     echo $count_mo_amt;

	}


	
	function ShowChurchGift()
	{
		 global $db;

		 // Total Expenses 
	     $tot_sg   = "SELECT * FROM spiritual_gift_tbl";
	     $run_sg   = mysqli_query($db, $tot_sg);
	     $sg_amt   = 0;
	     while($row_sg = mysqli_fetch_array($run_sg))
	     {
	        $sg_amt += $row_sg['gift_price'];
	     }
	     
	     $count_sg_amt = number_format($sg_amt, 2);
	     echo $count_sg_amt;

	}






?>