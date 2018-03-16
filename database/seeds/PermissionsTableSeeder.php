<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
          [
            'id' => '1',
            'name' => 'TOPページ^カレンダー表示',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '2',
            'name' => '予約内容^予約変更',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '3',
            'name' => '予約内容^予約取り消し',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '4',
            'name' => '予約内容^緊急お知らせ送信',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '5',
            'name' => '緊急お知らせ^受信',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '6',
            'name' => '緊急お知らせ^一覧表示',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '7',
            'name' => 'お知らせ^新規登録',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '8',
            'name' => 'お知らせ^編集',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '9',
            'name' => 'お知らせ^一覧表示',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '10',
            'name' => '更新履歴^検索条件範囲',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '11',
            'name' => '更新履歴^一覧表示',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '12',
            'name' => '予約管理^検索条件範囲',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '13',
            'name' => '予約管理^一覧表示',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '14',
            'name' => '売上管理^売上・統計表示',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '15',
            'name' => '顧客管理^検索条件範囲',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '16',
            'name' => '顧客管理^一覧表示',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '17',
            'name' => '顧客管理^顧客連絡先',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '18',
            'name' => '商品管理^検索条件範囲',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '19',
            'name' => '商品管理^一覧表示',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '20',
            'name' => '商品管理^注文取り消し',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '21',
            'name' => '商品管理^詳細記入・データ選択・入金確認',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '22',
            'name' => '商品管理^編集・発注・完成受取・納品発送',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '23',
            'name' => 'シフト管理^シフト作成',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '24',
            'name' => '設定^フランチャイズ管理',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '25',
            'name' => '設定^店舗管理',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '26',
            'name' => '設定^スタジオ管理',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '27',
            'name' => '設定^アカウント管理',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '28',
            'name' => '設定^撮影内容作成・編集',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '29',
            'name' => '設定^メールテンプレート作成・編集',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '30',
            'name' => '設定^予約枠作成・編集',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '31',
            'name' => '設定^スタッフリスト管理',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '32',
            'name' => '設定^スタッフ種別の登録・編集',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => '33',
            'name' => '設定^商品一覧',
            'guard_name' => 'web',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
        ]);
    }
}
