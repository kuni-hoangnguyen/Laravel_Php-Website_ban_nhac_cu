<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_category')->insert([
            [
                'category_name' => 'ThunderBeats Drum Kit',
                'category_image' => 'drum1.jpg',
                'category_type' => 8,  // Trống - ID từ tbl_type
                'category_price' => 1500000,
                'category_description' => 'ThunderBeats Drum Kit mang đến chất lượng âm thanh tuyệt vời và độ bền vượt trội, lý tưởng cho các nhạc công chuyên nghiệp. Được thiết kế tỉ mỉ, bộ trống này sử dụng vật liệu cao cấp, tạo ra âm thanh phong phú và ổn định. Dù bạn biểu diễn trực tiếp hay thu âm trong phòng thu, ThunderBeats luôn đảm bảo trải nghiệm hoàn hảo.',
                'category_quantity' => 0,
                'category_rating' => 4.5,
            ],
            [
                'category_name' => 'PulseDrum Percussion Set',
                'category_image' => 'drum2.jpg',
                'category_type' => 8,  // Trống - ID từ tbl_type
                'category_price' => 1200000,
                'category_description' => 'PulseDrum Percussion Set được thiết kế dành riêng cho người mới bắt đầu và những ai yêu thích chơi trống. Với thiết kế nhẹ nhàng, dễ lắp ráp, bộ trống này rất phù hợp để luyện tập tại nhà hoặc biểu diễn đơn giản. Mặc dù có giá cả phải chăng, nhưng PulseDrum vẫn đảm bảo chất lượng âm thanh trong trẻo và sắc nét.',
                'category_quantity' => 15,
                'category_rating' => 4.2,
            ],
            [
                'category_name' => 'EchoRhythm Drum Collection',
                'category_image' => 'drum3.jpg',
                'category_type' => 8,  // Trống - ID từ tbl_type
                'category_price' => 1800000,
                'category_description' => 'EchoRhythm Drum Collection được chế tạo cho những nhạc công chuyên nghiệp đang tìm kiếm âm thanh và hiệu suất vượt trội. Với phần cứng hiện đại và mặt trống chất lượng cao, bộ sưu tập này đảm bảo âm thanh ổn định cho nhiều phong cách âm nhạc khác nhau. Thiết kế sang trọng và kết cấu bền bỉ làm cho nó trở thành sự lựa chọn hàng đầu của các tay trống.',
                'category_quantity' => 5,
                'category_rating' => 4.8,
            ],
            [
                'category_name' => 'SonicVibe Electric Guitar',
                'category_image' => 'guitar-img.jpg',
                'category_type' => 1,  // Guitar - ID từ tbl_type
                'category_price' => 5000000,
                'category_description' => 'SonicVibe Electric Guitar mang đến âm thanh tuyệt hảo và hiệu suất vượt trội. Được thiết kế cho cả những người chơi mới và các nhạc sĩ chuyên nghiệp, cây đàn guitar này đảm bảo trải nghiệm chơi nhạc mượt mà nhờ cần đàn trơn tru và thiết kế nhẹ nhàng. Với âm sắc đa dạng, SonicVibe phù hợp với nhiều thể loại nhạc, từ rock đến jazz.',
                'category_quantity' => 20,
                'category_rating' => 4.7,
            ],
            [
                'category_name' => 'PureSound Wireless Headphones',
                'category_image' => 'headphone2.jpg',
                'category_type' => 7,  // Tai nghe - ID từ tbl_type
                'category_price' => 2400000,
                'category_description' => 'Tai nghe không dây PureSound tái định nghĩa độ trong trẻo của âm thanh với công nghệ chống ồn tiên tiến. Được thiết kế dành cho cả người yêu nhạc và các chuyên gia, tai nghe này mang đến chất lượng âm thanh sống động và cảm giác thoải mái khi sử dụng lâu dài. Cho dù bạn đang di chuyển, làm việc hay thư giãn tại nhà, PureSound luôn đảm bảo trải nghiệm âm thanh hoàn hảo.',
                'category_quantity' => 30,
                'category_rating' => 4.3,
            ],
            [
                'category_name' => 'SonicWave Over-Ear Headphones',
                'category_image' => 'headphone3.jpg',
                'category_type' => 7,  // Tai nghe - ID từ tbl_type
                'category_price' => 2800000,
                'category_description' => 'SonicWave Over-Ear Headphones mang đến chất lượng âm thanh tuyệt vời với âm bass sâu và âm treble trong trẻo. Thiết kế ôm trọn tai, tạo cảm giác thoải mái, thích hợp cho những ai yêu thích nghe nhạc trong thời gian dài. Sản phẩm có tính năng chống ồn chủ động giúp bạn đắm chìm hoàn toàn trong âm nhạc.',
                'category_quantity' => 25,
                'category_rating' => 4.6,
            ],
            [
                'category_name' => 'ClearVoice Studio Microphone',
                'category_image' => 'micro1.jpg',
                'category_type' => 3,  // Micro - ID từ tbl_type
                'category_price' => 1500000,
                'category_description' => 'Micro thu âm ClearVoice Studio là sự lựa chọn tuyệt vời cho các nhà sáng tạo nội dung và phòng thu tại nhà. Với thiết kế nhỏ gọn và độ nhạy cao, micro này thu lại mọi chi tiết giọng nói với độ rõ nét đáng kinh ngạc. Dù bạn thu podcast, giọng hát hay nhạc cụ, ClearVoice luôn mang lại kết quả chuyên nghiệp.',
                'category_quantity' => 50,
                'category_rating' => 4.0,
            ],
            [
                'category_name' => 'EchoPro Professional Microphone',
                'category_image' => 'micro2.jpg',
                'category_type' => 3,  // Micro - ID từ tbl_type
                'category_price' => 2000000,
                'category_description' => 'EchoPro Professional Microphone là một trong những micro thu âm chất lượng cao dành cho những chuyên gia âm thanh. Với độ rõ ràng và khả năng thu âm chi tiết, EchoPro giúp bạn tạo ra những bản thu hoàn hảo cho các sản phẩm âm nhạc, podcast hay bất kỳ dự án thu âm nào.',
                'category_quantity' => 0,
                'category_rating' => 4.5,
            ],
            [
                'category_name' => 'GrandTone Digital Piano',
                'category_image' => 'piano1.jpg',
                'category_type' => 4,  // Piano - ID từ tbl_type
                'category_price' => 11500000,
                'category_description' => 'GrandTone Digital Piano kết hợp công nghệ hiện đại với âm thanh piano cổ điển. Với phím nặng mang lại cảm giác chân thực, cây đàn này rất phù hợp cho việc luyện tập và biểu diễn trực tiếp. Bộ xử lý âm thanh tiên tiến tái tạo âm thanh piano chân thực cùng nhiều âm sắc đa dạng để phù hợp với phong cách âm nhạc của bạn.',
                'category_quantity' => 10,
                'category_rating' => 4.7,
            ],
            [
                'category_name' => 'IvoryHarmony Acoustic Piano',
                'category_image' => 'piano2.jpg',
                'category_type' => 4,  // Piano - ID từ tbl_type
                'category_price' => 12000000,
                'category_description' => 'IvoryHarmony Acoustic Piano là cây đàn piano điện tử cao cấp với âm thanh sống động và âm lượng lớn. Cây đàn này sở hữu bàn phím cảm ứng nhạy, cho cảm giác chơi mượt mà và chính xác. Sản phẩm phù hợp cho cả người chơi mới và các nghệ sĩ biểu diễn chuyên nghiệp.',
                'category_quantity' => 8,
                'category_rating' => 4.9,
            ],
            [
                'category_name' => 'CodeCraft Development Suite',
                'category_image' => 'soft1.png',
                'category_type' => 5,  // Phần mềm - ID từ tbl_type
                'category_price' => 1500000,
                'category_description' => 'CodeCraft Development Suite là phần mềm phát triển âm nhạc hàng đầu cho các nhà sản xuất âm nhạc chuyên nghiệp. Với các công cụ và tính năng mạnh mẽ, phần mềm này hỗ trợ tạo ra âm thanh chất lượng cao, chỉnh sửa và thu âm với độ chính xác tối ưu.',
                'category_quantity' => 100,
                'category_rating' => 4.4,
            ],
            [
                'category_name' => 'TechMind Creative Software',
                'category_image' => 'soft2.jpg',
                'category_type' => 5,  // Phần mềm - ID từ tbl_type
                'category_price' => 1700000,
                'category_description' => 'TechMind Creative Software là một công cụ phần mềm toàn diện cho những ai muốn sáng tạo âm nhạc. Với giao diện dễ sử dụng và các tính năng tiên tiến, TechMind giúp bạn dễ dàng tạo ra các bản nhạc phức tạp và hiệu quả.',
                'category_quantity' => 150,
                'category_rating' => 4.6,
            ],
            [
                'category_name' => 'SonicBoom Bluetooth Speaker',
                'category_image' => 'speaker1.png',
                'category_type' => 2,  // Loa - ID từ tbl_type
                'category_price' => 2400000,
                'category_description' => 'SonicBoom Bluetooth Speaker là một chiếc loa Bluetooth di động nhỏ gọn nhưng mạnh mẽ, mang lại âm thanh sống động và rõ ràng. Với khả năng kết nối dễ dàng với các thiết bị di động, nó là lựa chọn lý tưởng cho các buổi tiệc ngoài trời hoặc trong nhà.',
                'category_quantity' => 0,
                'category_rating' => 4.3,
            ],
            [
                'category_name' => 'ClearEcho Portable Speaker',
                'category_image' => 'speaker2.jpg',
                'category_type' => 2,  // Loa - ID từ tbl_type
                'category_price' => 3000000,
                'category_description' => 'ClearEcho Portable Speaker cung cấp âm thanh 360 độ mạnh mẽ, lý tưởng cho những không gian rộng lớn. Với công nghệ Bluetooth mới nhất, loa này đảm bảo chất lượng âm thanh mượt mà và dễ dàng kết nối với các thiết bị khác.',
                'category_quantity' => 50,
                'category_rating' => 4.7,
            ],
			[
				'category_name' => 'WaveSynth Analog Synthesizer',
				'category_image' => 'syn1.jpg',
				'category_type' => 6,
				'category_price' => 6000000,
				'category_description' => 'WaveSynth Analog Synthesizer là một cỗ máy sáng tạo âm thanh mạnh mẽ. Với bộ điều khiển linh hoạt, synthesizer này cho phép nhạc sĩ tạo ra những tông âm độc đáo một cách dễ dàng. Hoàn hảo cho các buổi biểu diễn trực tiếp và sử dụng trong phòng thu, WaveSynth là lựa chọn không thể thiếu đối với các nhà sản xuất âm nhạc điện tử.',
				'category_quantity' => 20,
				'category_rating' => 4.5,
			],
			[
				'category_name' => 'HarmonicFlow Digital Synthesizer',
				'category_image' => 'syn2.jpg',
				'category_type' => 6,
				'category_price' => 6500000,
				'category_description' => 'HarmonicFlow Digital Synthesizer kết hợp công nghệ hiện đại với âm thanh analog cổ điển. Giao diện thân thiện với người dùng và các tính năng mạnh mẽ giúp sản phẩm phù hợp với nhạc sĩ ở mọi cấp độ. Dù bạn đang tạo ra các kết cấu âm thanh ambient hay những bassline mạnh mẽ, HarmonicFlow luôn mang lại kết quả xuất sắc.',
				'category_quantity' => 15,
				'category_rating' => 4.6,
			],
			
        ]);
    }
}
