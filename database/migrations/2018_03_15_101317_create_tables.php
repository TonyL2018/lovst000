<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('user', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('staff_id', 10)->nullable()->comment('スタッフID');
      $table->string('name')->unique()->comment('ユーザ名');
      $table->string('last_name_kanji')->default('')->comment('姓漢字');
      $table->string('first_name_kanji')->default('')->comment('名漢字');
      $table->string('last_name_kana')->default('')->comment('姓カナ');
      $table->string('first_name_kana')->default('')->comment('名カナ');
      $table->string('email')->nullable()->comment('メールアドレス');
      $table->string('password')->comment('パスワード（変換）');
      $table->string('telephone')->nullable()->comment('電話番号');
      $table->integer('role_id')->default(5)->comment('ロールID');
      $table->integer('fc_id')->nullable()->comment('FC本部ID');
      $table->integer('store_id')->nullable()->comment('店舗ID');
      $table->string('remarks', 500)->nullable();
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->rememberToken();
      $table->timestamps();
    });

    Schema::create('fc_honnbu', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('fc_id', 10)->nullable();
      $table->string('name')->nullable()->comment('ユーザ名');
      $table->string('detail',500)->comment('説明');
      $table->string('corporation')->nullable()->comment('法人名');
      $table->string('adress')->nullable()->comment('登記所在地');
      $table->string('telephone')->nullable()->comment('電話番号');
      $table->string('representative')->nullable()->comment('代表者名');
      $table->string('signer', 50)->nullable();
      $table->date('birthday')->nullable()->comment('代表者名生年月日');
      $table->string('capital', 100)->nullable()->comment('資本金');
      $table->date('start_date')->nullable()->comment('契約開始日');
      $table->string('duration', 100)->nullable();
      $table->string('tele_kaisya')->nullable()->comment('電話番号(会社)');
      $table->string('tele_kojin')->nullable()->comment('電話番号(個人)');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('shop', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('shop_id', 10)->nullable();
      $table->integer('fc_id')->comment('FC本部ID');
      $table->string('name')->comment('店舗名');
      $table->integer('post')->nullable()->comment('郵便番号');
      $table->string('address')->nullable()->comment('登記所在地');
      $table->string('route', 500)->nullable();
      $table->string('detail',500)->nullable()->comment('説明');
      $table->string('telephone')->nullable()->comment('電話番号');
      $table->string('email', 50)->nullable()->comment('メールアドレス');
      $table->string('train_station')->nullable()->comment('最寄り駅');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('permissions', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('guard_name');
        $table->timestamps();
    });

    Schema::create('roles', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('guard_name');
        $table->timestamps();
    });

    Schema::create('shop_holiday', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('shop_id')->comment('店舗ID');
      $table->date('start_date')->nullable()->comment('開始日付');
      $table->date('end_date')->nullable()->comment('終了日付');
      $table->integer('day_week')->nullable()->comment('曜日');
      $table->integer('weeks')->nullable()->comment('何週目');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('studio', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('studio_id', 10)->nullable();
      $table->string('name')->comment('スタジオ名');
      $table->string('detail',500)->comment('スタジオ詳細');
      $table->integer('pack_type')->default(0)->comment('プランのサポートタイプ(0：basicのみ,1:両方)');
      $table->integer('store_id')->comment('所属店舗');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('studio_schedule', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('studio_id')->comment('スタジオID');
      $table->date('start_date')->comment('開始日付');
      $table->date('end_date')->comment('終了日付');
      $table->time('coma_1')->nullable()->comment('コマ1');
      $table->time('coma_2')->nullable()->comment('コマ2');
      $table->time('coma_3')->nullable()->comment('コマ3');
      $table->time('coma_4')->nullable()->comment('コマ4');
      $table->time('coma_5')->nullable()->comment('コマ5');
      $table->time('coma_6')->nullable()->comment('コマ6');
      $table->time('coma_7')->nullable()->comment('コマ7');
      $table->time('coma_8')->nullable()->comment('コマ8');
      $table->time('coma_9')->nullable()->comment('コマ9');
      $table->time('coma_10')->nullable()->comment('コマ10');
      $table->time('coma_11')->nullable()->comment('コマ11');
      $table->time('coma_12')->nullable()->comment('コマ12');
      $table->time('coma_13')->nullable()->comment('コマ13');
      $table->time('coma_14')->nullable()->comment('コマ14');
      $table->time('coma_15')->nullable()->comment('コマ15');
      $table->time('coma_16')->nullable()->comment('コマ16');
      $table->time('coma_17')->nullable()->comment('コマ17');
      $table->time('coma_18')->nullable()->comment('コマ18');
      $table->time('coma_19')->nullable()->comment('コマ19');
      $table->time('coma_20')->nullable()->comment('コマ20');
      $table->timestamps();
    });

    Schema::create('studio_course', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('studio_id')->comment('スタジオID');
      $table->integer('course_id')->comment('コースID');
      $table->integer('sort_num')->comment('コース順');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('customer', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('customer_id',10)->comment('顧客ID');
      $table->string('password',20)->comment('パスワード');
      $table->string('last_name_kanji')->comment('姓漢字');
      $table->string('first_name_kanji')->comment('名漢字');
      $table->string('last_name_kana')->comment('姓カナ');
      $table->string('first_name_kana')->comment('名カナ');
      $table->string('telephone')->comment('電話番号');
      $table->string('email')->comment('メールアドレス');
      $table->boolean('line_flg')->nullable()->comment('Line連絡あり');
      $table->integer('post_number')->nullable()->comment('住所郵便番号');
      $table->string('adress')->nullable()->comment('市区町村番地');
      $table->string('build_name')->nullable()->comment('建物名など');
      $table->timestamps();
    });

    Schema::create('customer_child', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('customer_id')->comment('顧客ID');
      $table->string('name_kanji')->comment('姓漢字');
      $table->string('name_kana')->comment('姓カナ');
      $table->date('birthday')->comment('生年月日');
      $table->integer('gender')->comment('性別（0:の場合男の子、１の場合女の子）');
      $table->string('comment',500)->nullable()->comment('コメント',500);
      $table->timestamps();
    });

    Schema::create('product', function (Blueprint $table) {
      $table->increments('id');
      $table->bigInteger('productId')->nullable();
      $table->integer('categoryId')->nullable();
      $table->string('productCode', 20)->nullable();
      $table->string('productName', 255)->nullable();
      $table->string('productKana', 255)->nullable();
      $table->char('taxDivision', 1)->nullable();
      $table->char('productPriceDivision', 1)->nullable();
      $table->decimal('price', 10)->nullable();
      $table->decimal('customerPrice', 10)->nullable();
      $table->decimal('cost', 15, 5)->nullable();
      $table->text('attribute')->nullable();
      $table->text('description')->nullable();
      $table->text('catchCopy')->nullable();
      $table->string('size', 255)->nullable();
      $table->string('color', 255)->nullable();
      $table->string('tag', 255)->nullable();
      $table->string('groupCode', 255)->nullable();
      $table->string('url', 255)->nullable();
      $table->integer('displaySequence')->nullable();
      $table->char('displayFlag', 1)->nullable();
      $table->char('salesDivision', 1)->nullable();
      $table->char('division', 1)->nullable();
      $table->integer('productOptionGroupId')->nullable();
      $table->char('stockControlDivision', 1)->nullable();
      $table->char('pointNotApplicable', 1)->nullable();
      $table->char('taxFreeDivision', 1)->nullable();
      $table->char('supplierProductNo', 255)->nullable();
      $table->integer('staffDiscountRate')->nullable();
      $table->date('appStartDateTime')->nullable();
      $table->date('insDateTime')->nullable();
      $table->date('updDateTime')->nullable();
      $table->timestamps();
    });

    Schema::create('product_price', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('product_id')->comment('商品ID');
      $table->float('price')->comment('単価');
      $table->date('start_date')->comment('開始日付');
      $table->date('end_date')->nullable()->comment('終了日付');
      $table->timestamps();
    });

    Schema::create('order_status', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('name')->comment('ステータス名');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('reseve_status', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('status')->comment('ステータス名');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('email_template', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('name')->comment('テンプレート名');
      $table->string('title')->comment('テンプレートタイトル');
      $table->string('content',500)->comment('テンプレート内容');
      $table->integer('status')->comment('予約のステータス');
      $table->integer('owner_id')->nullable()->comment('オーナー');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('reseve_calender', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('calender_id')->nullable()->comment('予約カレンダーID');
      $table->integer('fc_id')->nullable()->comment('FC本部ID');
      $table->integer('shop_id')->nullable()->comment('店舗ID');
      $table->integer('studio_id')->comment('スタジオID');
      $table->date('date')->comment('日付');
      $table->timestamp('start_hhmm')->nullable()->comment('撮影開始時間');
      $table->timestamp('end_hhmm')->nullable()->comment('撮影終了時間');
      $table->timestamps();
    });

    Schema::create('reseve_info', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('customer_id')->comment('顧客ID');
      $table->integer('reseve_calender_id')->comment('予約カレンダーID');
      $table->integer('status_id')->comment('現在予約ステータスID');
      $table->integer('next_status_id')->nullable()->comment('次のステータスID');
      $table->integer('course_id')->comment('コースID');
      $table->timestamp('reseve_date')->nullable()->comment('予約時間');
      $table->timestamp('send_detail_mail_date')->nullable()->comment('詳細メール時間');
      $table->timestamp('photo_date')->nullable()->comment('撮影完了時間');
      $table->string('sumareji_id')->nullable()->comment('スマレジ決済ID');
      $table->boolean('cancel_flg')->nullable()->comment('キャンセルフラグ');
      $table->boolean('no_reason_cancel')->nullable()->comment('無断キャンセル');
      $table->integer('otona_num')->comment('大人人数');
      $table->integer('kodomo_num')->comment('子とも人数');
      $table->integer('ojioba_num')->comment('おじさん・おばさん人数');
      $table->boolean('family_flg')->comment('家族写真希望');
      $table->string('demand',500)->nullable()->comment('撮影に対する要望');
      $table->timestamps();
    });

    Schema::create('reseve_detail_old', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('calender_id')->comment('予約カレンダーID');
      $table->integer('wear_num')->nullable()->comment('着物の着用人数');
      $table->integer('three_girl')->nullable()->comment('753の撮影種類');
      $table->boolean('tabi_buy_flg')->nullable()->comment('足袋の購入の要望');
      $table->integer('tabi_13_num')->nullable()->comment('足袋のサイズ13〜14');
      $table->integer('tabi_15_num')->nullable()->comment('足袋のサイズ15〜16');
      $table->integer('tabi_17_num')->nullable()->comment('足袋のサイズ17〜18');
      $table->integer('tabi_19_num')->nullable()->comment('足袋のサイズ19〜20');
      $table->boolean('hair_meiku_flg')->nullable()->comment('ヘアメイクの希望');
      $table->integer('baby_month')->nullable()->comment('赤ちゃんの月齢');
      $table->integer('wear_info')->nullable()->comment('掛け着について');
      $table->boolean('family_wear_flg')->nullable()->comment('家族写真の掛け着撮影の希望');
      $table->boolean('boby_only_flg')->nullable()->comment('赤ちゃん一人の掛け着撮影の希望');
      $table->integer('family_num')->nullable()->comment('参加家族数');
      $table->string('photo_content',500)->nullable()->comment('どのような撮影内容を希望');
      $table->integer('birthday_old')->nullable()->comment('何歳のパースデーをお祝い');
      $table->integer('pregnancy_week')->nullable()->comment('撮影日の妊娠週数');
      $table->boolean('onaka_flg')->nullable()->comment('お腹の出しての撮影の希望');
      $table->boolean('hair_tutorial_flg')->nullable()->comment('ヘアアレンジの希望');
      $table->boolean('isyou_render_flg')->nullable()->comment('衣装レンタルの希望');
      $table->integer('satue_type')->nullable()->comment('ご希望の撮影内容(0の場合入園、１の場合入学、２の場合卒園、３の場合卒業)');
      $table->timestamps();
    });

    Schema::create('reseve_detail_new', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('calender_id')->comment('予約カレンダーID');
      $table->integer('question_id')->comment('質問ID:撮影コース ごと設問テーブルを参照');
      $table->integer('option_id')->nullable()->comment('質問のオプションID');
      $table->string('answer')->nullable()->comment('回答内容');
      $table->timestamps();
    });

    Schema::create('reseve_history', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('reseve_info_id')->comment('予約ID');
      $table->string('content')->nullable()->comment('更新内容');
      $table->string('staffname')->nullable()->comment('対応担当');
      $table->timestamps();
    });

    Schema::create('reseve_staff', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('reseve_info_id')->comment('予約ID');
      $table->integer('staff_id')->comment('店員ID');
      $table->timestamps();
    });

    Schema::create('course', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('name')->comment('コース名');
      $table->boolean('new_flg')->comment('新コースフラグ');
      $table->integer('owner_id')->nullable()->comment('オーナーID');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('course_question', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('course_id')->comment('コースID');
      $table->integer('type_id')->nullable()->comment('質問タイプ');
      $table->string('question_name',500)->comment('質問内容');
      $table->string('question_subtext',500)->nullable()->comment('質問sub 内容');
      $table->boolean('answer_required')->nullable()->comment('回答必須');
      $table->boolean('question_required')->nullable()->comment('質問表示');
      $table->integer('sort_num')->nullable()->comment('質問順番');
      $table->boolean('new_flg')->comment('新コースフラグ');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('input_type', function (Blueprint $table) {
      $table->increments('id')->comment('タイプID');
      $table->string('name')->comment('タイプ名');
    });

    Schema::create('question_option', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('question_id')->comment('質問ID');
      $table->string('label')->nullable()->comment('オプションlabel');
      $table->string('value')->nullable()->comment('オプションvalue');
    });

    Schema::create('course_question_new', function (Blueprint $table) {
      $table->increments('id')->comment('設問ID');
      $table->integer('course_id')->comment('撮影コーステーブルを参照');
      $table->integer('num')->comment('設問順番');
      $table->string('question_text')->comment('設問内容');
      $table->string('question_attr')->comment('設問属性名');
      $table->string('quesiton_type')->comment('設問種類');
      $table->string('answer1')->nullable()->comment('回答1');
      $table->string('answer2')->nullable()->comment('回答2');
      $table->string('answer3')->nullable()->comment('回答3');
      $table->string('answer4')->nullable()->comment('回答4');
      $table->string('answer5')->nullable()->comment('回答5');
      $table->string('answer6')->nullable()->comment('回答6');
      $table->string('answer7')->nullable()->comment('回答7');
      $table->string('answer8')->nullable()->comment('回答8');
      $table->string('answer9')->nullable()->comment('回答9');
      $table->string('answer10')->nullable()->comment('回答10');
      $table->integer('owner_id')->nullable()->comment('オーナー');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('product_order', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->string('order_id')->comment('注文ID');
      $table->integer('customer_id')->comment('顧客ID');
      $table->integer('reseve_id')->comment('予約ID');
      $table->integer('status_id')->comment('ステータスID');
      $table->integer('product_id')->comment('商品ID');
      $table->integer('num')->comment('商品数量');
      $table->date('oder_date')->nullable()->comment('発注日');
      $table->date('charge_date')->nullable()->comment('入金日');
      $table->date('delivery_date')->nullable()->comment('納品日');
      $table->timestamps();
    });

    Schema::create('product_order_history', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('order_id')->comment('注文ID');
      $table->string('content')->comment('変更内容');
      $table->string('staffname')->comment('対応担当');
      $table->integer('before_status')->nullable()->comment('変更前ステータス');
      $table->integer('after_status')->nullable()->comment('変更後ステータス');
      $table->timestamps();
    });

    Schema::create('occupation', function (Blueprint $table) {
      $table->increments('id')->comment('設問ID');
      $table->string('name')->comment('職種名');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('model_has_permissions', function (Blueprint $table) {
        $table->integer('permission_id')->unsigned();
        $table->morphs('model');

        $table->foreign('permission_id')
            ->references('id')
            ->on('permissions')
            ->onDelete('cascade');

        $table->primary(['permission_id', 'model_id', 'model_type']);
    });

    Schema::create('photo', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('reseve_id')->comment('注文ID');
      $table->string('filename')->comment('写真ファイル名');
      $table->string('path')->nullable()->comment('S3パス');
      $table->string('thumbnail_flg')->nullable()->comment('サムネイルフラグ');
      $table->timestamps();
    });

    Schema::create('emergency_notice', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->string('content',500)->nullable()->comment('内容');
      $table->timestamp('time')->comment('日時');
      $table->integer('reseve_id')->comment('注文ID');
      $table->timestamps();
    });

    Schema::create('notice', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->string('title')->nullable()->comment('タイトル');
      $table->string('content',500)->nullable()->comment('内容');
      $table->timestamp('time')->comment('日時');
      $table->integer('staff_id')->comment('ユーザID');
      $table->timestamps();
    });

    Schema::create('notice_read', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('notice_id')->comment('お知らせID');
      $table->integer('staff_id')->comment('スタッフID');
      $table->timestamps();
    });

    Schema::create('role', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->string('name')->comment('ロール名');
      // $table->integer('notice_id')->comment('お知らせID');
      // $table->integer('staff_id')->comment('スタッフID');
      $table->timestamps();
    });

    Schema::create('model_has_roles', function (Blueprint $table) {
        $table->integer('role_id')->unsigned();
        $table->morphs('model');

        $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');

        $table->primary(['role_id', 'model_id', 'model_type']);
    });

    Schema::create('employee', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('staff_id')->comment('スタッフID');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    Schema::create('staff_occupation', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('staff_id')->comment('スタッフID');
      $table->integer('occupation_id')->comment('職種ID');
      $table->timestamps();
    });

    Schema::create('password_resets', function (Blueprint $table) {
        $table->string('email')->index();
        $table->string('token');
        $table->timestamp('created_at')->nullable();
    });

    Schema::create('role_has_permissions', function (Blueprint $table) {
        $table->integer('permission_id')->unsigned();
        $table->integer('role_id')->unsigned();

        $table->foreign('permission_id')
            ->references('id')
            ->on('permissions')
            ->onDelete('cascade');

        $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');

        $table->primary(['permission_id', 'role_id']);

    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('user');
    Schema::dropIfExists('fc_honnbu');
    Schema::dropIfExists('shop');
    Schema::dropIfExists('shop_holiday');
    Schema::dropIfExists('studio');
    Schema::dropIfExists('studio_schedule');
    Schema::dropIfExists('studio_course');
    Schema::dropIfExists('customer');
    Schema::dropIfExists('customer_child');
    Schema::dropIfExists('product');
    Schema::dropIfExists('product_price');
    Schema::dropIfExists('order_status');
    Schema::dropIfExists('reseve_status');
    Schema::dropIfExists('email_template');
    Schema::dropIfExists('reseve_calender');
    Schema::dropIfExists('reseve_info');
    Schema::dropIfExists('reseve_detail_old');
    Schema::dropIfExists('reseve_detail_new');
    Schema::dropIfExists('reseve_history');
    Schema::dropIfExists('reseve_staff');
    Schema::dropIfExists('course');
    Schema::dropIfExists('course_question');
    Schema::dropIfExists('course_question_new');
    Schema::dropIfExists('input_type');
    Schema::dropIfExists('question_option');
    Schema::dropIfExists('product_order');
    Schema::dropIfExists('product_order_history');
    Schema::dropIfExists('occupation');
    Schema::dropIfExists('staff_occupation');
    Schema::dropIfExists('photo');
    Schema::dropIfExists('emergency_notice');
    Schema::dropIfExists('notice');
    Schema::dropIfExists('notice_read');
    Schema::dropIfExists('role');
    Schema::dropIfExists('employee');
    Schema::dropIfExists('staff_occupation');
    Schema::dropIfExists('role_has_permissions');
    Schema::dropIfExists('model_has_roles');
    Schema::dropIfExists('model_has_permissions');
    Schema::dropIfExists('roles');
    Schema::dropIfExists('permissions');
    Schema::dropIfExists('password_resets');
  }
}
