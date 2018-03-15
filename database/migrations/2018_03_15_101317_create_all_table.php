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
    //
    // user
    // 管理ツールスタッフ情報
    Schema::create('user', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('staff_id')->default('')->comment('スタッフID');
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
      $table->integer('shop_id')->nullable()->comment('店舗ID');
      $table->boolean('delete_flg')->default(0)->comment('削除フラグ');
      $table->timestamps();
    });

    //FC本部
    Schema::create('fc_honnbu', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('name')->comment('ユーザ名');
      $table->string('detail',500)->comment('説明');
      $table->string('corporation')->nullable()->comment('法人名');
      $table->string('adress')->nullable()->comment('登記所在地');
      $table->string('telephone')->nullable()->comment('電話番号');
      $table->string('representative')->nullable()->comment('代表者名');
      $table->date('birthday')->nullable()->comment('代表者名生年月日');
      $table->integer('capital')->nullable()->comment('資本金');
      $table->date('start_date')->nullable()->comment('契約開始日');
      $table->string('tele_kaisya')->nullable()->comment('電話番号(会社)');
      $table->string('tele_kojin')->nullable()->comment('電話番号(個人)');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //店舗
    Schema::create('shop', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('fc_id')->comment('FC本部ID');
      $table->string('name')->comment('店舗名');
      $table->integer('post')->comment('郵便番号');
      $table->string('address')->nullable()->comment('登記所在地');
      $table->string('detail',500)->nullable()->comment('説明');
      $table->string('telephone')->nullable()->comment('電話番号');
      $table->string('train_station')->nullable()->comment('最寄り駅');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //店舗定休日
    Schema::create('shop_holiday', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('shop_id')->comment('店舗ID');
      $table->date('start_date')->comment('開始日付');
      $table->date('end_date')->comment('終了日付');
      $table->integer('day_week')->comment('曜日');
      $table->integer('weeks')->comment('何週目');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //スタジオ情報
    Schema::create('studio', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('name')->comment('スタジオ名');
      $table->string('detail',500)->comment('スタジオ詳細');
      $table->integer('pack_type')->comment('プランのサポートタイプ(0：basicのみ,1:両方)');
      $table->integer('shop_id')->comment('所属店舗');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //スタジオの撮影コマ
    Schema::create('studio_schedule', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('studio_id')->comment('スタジオID');
      $table->date('start_date')->comment('開始日付');
      $table->date('end_date')->comment('終了日付');
      $table->timestamp('coma_1')->nullable()->comment('コマ1');
      $table->timestamp('coma_2')->nullable()->comment('コマ2');
      $table->timestamp('coma_3')->nullable()->comment('コマ3');
      $table->timestamp('coma_4')->nullable()->comment('コマ4');
      $table->timestamp('coma_5')->nullable()->comment('コマ5');
      $table->timestamp('coma_6')->nullable()->comment('コマ6');
      $table->timestamp('coma_7')->nullable()->comment('コマ7');
      $table->timestamp('coma_8')->nullable()->comment('コマ8');
      $table->timestamp('coma_9')->nullable()->comment('コマ9');
      $table->timestamp('coma_10')->nullable()->comment('コマ10');
      $table->timestamp('coma_11')->nullable()->comment('コマ11');
      $table->timestamp('coma_12')->nullable()->comment('コマ12');
      $table->timestamp('coma_13')->nullable()->comment('コマ13');
      $table->timestamp('coma_14')->nullable()->comment('コマ14');
      $table->timestamp('coma_15')->nullable()->comment('コマ15');
      $table->timestamps();
    });

    //スタジオ撮影可能コース
    Schema::create('studio_course', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('studio_id')->comment('スタジオID');
      $table->integer('course_id')->comment('コースID');
      $table->integer('sort_num')->comment('コース順');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //顧客情報を管理
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

    //顧客情報＿お子様
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

    //商品
    Schema::create('product', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('product_id')->comment('商品ID');
      $table->string('dep_id')->comment('部門ID');
      $table->string('code')->comment('商品コード');
      $table->string('name')->comment('商品名');
      $table->string('kana')->comment('商品カナ');
      $table->string('price')->comment('商品単価');
      $table->string('cost')->nullable()->comment('原価');
      $table->string('kisoku',500)->nullable()->comment('規格');
      $table->string('setumei')->nullable()->comment('説明');
      $table->string('catch_copy')->nullable()->comment('キャッチコピー');
      $table->string('kaiin_price')->nullable()->comment('会員価格');
      $table->string('size')->nullable()->comment('サイズ');
      $table->string('color')->nullable()->comment('カラー');
      $table->string('tag')->nullable()->comment('タグ');
      $table->string('group_code')->nullable()->comment('グループコード');
      $table->string('url')->nullable()->comment('URL');
      $table->string('device')->nullable()->comment('端末表示');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //商品価額
    Schema::create('product_price', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('product_id')->comment('商品ID');
      $table->float('price')->comment('単価');
      $table->date('start_date')->comment('開始日付');
      $table->date('end_date')->nullable()->comment('終了日付');
      $table->timestamps();
    });

    //注文ステータス
    Schema::create('order_status', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('name')->comment('ステータス名');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //予約ステータス
    Schema::create('reseve_status', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('status')->comment('ステータス名');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //メールテンプレート
    Schema::create('email_template', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('name')->comment('テンプレート名');
      $table->string('title')->comment('テンプレートタイトル');
      $table->string('content',500)->comment('テンプレート内容');
      $table->integer('status')->comment('予約のステータス');
      $table->integer('owner_id')->nullable()->comment('オーナー');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //予約カレンダー
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

    //顧客予約情報
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

    //予約詳細情報（既存コース）
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

    //予約詳細情報（新コース）
    Schema::create('reseve_detail_new', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('calender_id')->comment('予約カレンダーID');
      $table->integer('question_id')->comment('質問ID:撮影コース ごと設問テーブルを参照');
      $table->integer('option_id')->nullable()->comment('質問のオプションID');
      $table->string('answer')->nullable()->comment('回答内容');
      $table->timestamps();
    });

    //顧客の予約履歴情報
    Schema::create('reseve_history', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('reseve_info_id')->comment('予約ID');
      $table->string('content')->nullable()->comment('更新内容');
      $table->string('staffname')->nullable()->comment('対応担当');
      $table->timestamps();
    });

    //予約担当者
    Schema::create('reseve_staff', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('reseve_info_id')->comment('予約ID');
      $table->integer('staff_id')->comment('店員ID');
      $table->timestamps();
    });

    //撮影コース
    Schema::create('course', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->string('name')->comment('コース名');
      $table->boolean('new_flg')->comment('新コースフラグ');
      $table->integer('owner_id')->nullable()->comment('オーナーID');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //撮影コースの質問
    Schema::create('course_question', function (Blueprint $table) {
      $table->increments('id')->comment('連番用ID');
      $table->integer('course_id')->comment('コースID');
      $table->integer('type_id')->nullable()->comment('質問タイプ');
      $table->string('question_name',500)->comment('質問内容');
      $table->string('question_subtext',500)->comment('質問sub 内容');
      $table->boolean('answer_required')->nullable()->comment('回答必須');
      $table->boolean('question_required')->nullable()->comment('質問表示');
      $table->integer('sort_num')->nullable()->comment('質問順番');
      $table->boolean('new_flg')->comment('新コースフラグ');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //質問タイプ
    Schema::create('input_type', function (Blueprint $table) {
      $table->increments('id')->comment('タイプID');
      $table->string('name')->comment('タイプ名');
    });

    //質問オプション
    Schema::create('question_option', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('question_id')->comment('質問ID');
      $table->string('label')->nullable()->comment('オプションlabel');
      $table->string('value')->nullable()->comment('オプションvalue');
    });

    //撮影コースごと設問情報
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

    //商品注文情報
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

    //商品注文更新履歴
    Schema::create('product_order_history', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('order_id')->comment('注文ID');
      $table->string('content')->comment('変更内容');
      $table->string('staffname')->comment('対応担当');
      $table->integer('before_status')->nullable()->comment('変更前ステータス');
      $table->integer('after_status')->nullable()->comment('変更後ステータス');
      $table->timestamps();
    });

    //職種情報
    Schema::create('occupation', function (Blueprint $table) {
      $table->increments('id')->comment('設問ID');
      $table->string('name')->comment('職種名');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    //商品注文更新履歴
    Schema::create('photo', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('reseve_id')->comment('注文ID');
      $table->string('filename')->comment('写真ファイル名');
      $table->string('path')->nullable()->comment('S3パス');
      $table->string('thumbnail_flg')->nullable()->comment('サムネイルフラグ');
      $table->timestamps();
    });

    //緊急通知
    Schema::create('emergency_notice', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->string('content',500)->nullable()->comment('内容');
      $table->timestamp('time')->comment('日時');
      $table->integer('reseve_id')->comment('注文ID');
      $table->timestamps();
    });

    //お知らせ
    Schema::create('notice', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->string('title')->nullable()->comment('タイトル');
      $table->string('content',500)->nullable()->comment('内容');
      $table->timestamp('time')->comment('日時');
      $table->integer('staff_id')->comment('ユーザID');
      $table->timestamps();
    });

    //お知らせ
    Schema::create('notice_read', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('notice_id')->comment('お知らせID');
      $table->integer('staff_id')->comment('スタッフID');
      $table->timestamps();
    });

    //ロール情報
    Schema::create('role', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->string('name')->comment('ロール名');
      // $table->integer('notice_id')->comment('お知らせID');
      // $table->integer('staff_id')->comment('スタッフID');
      $table->timestamps();
    });

    //店員情報
    Schema::create('employee', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('staff_id')->comment('スタッフID');
      $table->boolean('delete_flg')->comment('削除フラグ');
      $table->timestamps();
    });

    // 店員と職種情報
    Schema::create('staff_occupation', function (Blueprint $table) {
      $table->increments('id')->comment('ID');
      $table->integer('staff_id')->comment('スタッフID');
      $table->integer('occupation_id')->comment('職種ID');
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    //
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
  }
}
