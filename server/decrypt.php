<?php
function room_no($r_no)
{
    if($r_no < 192) // for nehru bhavan
    {
        //$hostel_name = 'NEHRU-';
        $no_of_rooms_in_a_wing = 96;
        $w = $r_no/$no_of_rooms_in_a_wing;

        if($w > 1) //For  B wing
        {
            $wing = 'B';

            $r_no = $r_no - 96;
        if($r_no/32 > 2)//for second floor
            {
                $floor = 'S-';
                $room_number = $r_no -63;
            }

            else if($r_no / 32  > 1) //for first floor
            {
                $floor ='F-';
                $room_number = $r_no -31;
            }



            else//for groung floor
            {
                $floor = 'G-';
                $room_number = $r_no + 1;
            }





        }

        else//for B wing
        {
            $wing = 'A';

            if($r_no /32> 2)//for second floor
            {
                $floor = 'S-';
                $room_number = $r_no -63;
            }

            else if($r_no / 32 > 1) //for first floor
            {
                $floor ='F-';
                $room_number = $r_no -31;
            }



            else//for groung floor
            {
                $floor = 'G-';
                $room_number = $r_no + 1;
            }

        }
        $final_room = $wing.$floor.$room_number;

    }

    else if($r_no >= 192 && $r_no < 384)
     //for Tagore bhavan
    {
        $r_no = $r_no - 192;

        //$hostel_name = 'TAGORE-';
        $no_of_rooms_in_a_wing = 96;
        $w = $r_no/$no_of_rooms_in_a_wing;
        if($w > 1) //For B wing
        {
            $wing = 'B';

            $r_no = $r_no - 96;

            if($r_no/32 > 2)//for second floor
            {
                $floor = 'S-';
                $room_number = $r_no -63;
            }

            else if($r_no / 32 > 1) //for first floor
            {
                $floor ='F-';
                $room_number = $r_no -31;
            }

            else //for groung floor
            {
                $floor = 'G-';
                $room_number = $r_no + 1;
            }





        }

        else//for B wing
        {
            $wing = 'A';
             if($r_no/32 > 2)//for second floor
            {
                $floor = 'S-';
                $room_number = $r_no -63;
            }

            else if($r_no / 32 > 1) //for first floor
            {
                $floor ='F-';
                $room_number = $r_no -31;
            }

            else //for groung floor
            {
                $floor = 'G-';
                $room_number = $r_no + 1;
            }
        }
        $final_room = $wing.$floor.$room_number;

    }

    else //for bhabha bhavan
    {
        //$hostel_name = 'BHABHA-';
        $r_no = $r_no - 384;
        //$floor = 'F';
        if($r_no >=0 && $r_no <30) //for A wing
        {
            $wing = 'A-';
            $room_number = $r_no +1+100;
        }
        else //for B wing
        {
            $wing = 'B-';
            $room_number = $r_no -29+100;
        }
        $final_room = $wing.$room_number;
    }

    //$final_room = $hostel_name;
    //$final_room  = $wing;
    //$final_room .= $floor;
    //$final_room .= $room_number;

    //echo $final_room;
    return $final_room;
}




function hostel($r_no)
{
    if($r_no < 192) // for nehru bhavan
    {
        $hostel_name = 'NEHRU';
    }

    else if($r_no >= 192 && $r_no < 384) //for Tagore bhavan
    {
        $hostel_name = 'TAGORE';
    }
     else //for bhabha bhavan
    {
        $hostel_name = 'BHABHA';
    }

    return $hostel_name;
}
//room_no(325);
?>

