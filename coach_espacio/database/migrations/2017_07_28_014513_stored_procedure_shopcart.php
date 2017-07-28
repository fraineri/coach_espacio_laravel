<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoredProcedureShopcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::unprepared(" CREATE PROCEDURE `clearShopcart`()
            BEGIN
                DECLARE s_id INT(10);
                DECLARE i_id INT(10);
                DECLARE p_id INT(10);
                DECLARE i_qty INT (11);
                DECLARE updated timestamp;
                DECLARE finished BOOLEAN DEFAULT FALSE;
                DECLARE finished_i BOOLEAN DEFAULT FALSE;
                
                DECLARE shopCursor CURSOR FOR 
                    SELECT id, updated_at FROM shopcarts;
                DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = true;
                
                OPEN shopCursor;
                shoploop: LOOP
                    FETCH shopCursor INTO s_id ,updated;
                    IF finished THEN
                        SET finished = false;
                        LEAVE shoploop;
                    END IF;

                    IF updated < DATE_SUB(NOW(), INTERVAL '5' MINUTE) THEN
                        BLOCK2:BEGIN
                            DECLARE itemCursor CURSOR FOR 
                                SELECT id, product_id, qty FROM items WHERE shopcart_id = s_id;
                            DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished_i = true;
                            OPEN itemCursor;
                            itemloop: LOOP
                                FETCH itemCursor INTO i_id,p_id,i_qty;
                                IF finished_i THEN
                                    SET finished_i = false;
                                    LEAVE itemloop;
                                END IF;
                                UPDATE products SET stock = stock + i_qty WHERE id = p_id;
                                DELETE FROM items where id = i_id;
                            END LOOP itemloop;
                            CLOSE itemCursor;
                        END BLOCK2;
                        DELETE FROM shopcarts WHERE id = s_id;
                    END IF;        
                END LOOP shoploop;
                CLOSE shopCursor;
            END ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP procedure IF EXISTS `clearShopcart`");
    }
}
