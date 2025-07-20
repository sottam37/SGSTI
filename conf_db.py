import sys
from PyQt5.QtWidgets import QApplication, QWidget, QVBoxLayout, QPushButton, QFileDialog, QTextEdit

class FileEditorApp(QWidget):
    def __init__(self):
        super().__init__()

        self.init_ui()

    def init_ui(self):
        self.setGeometry(100, 100, 600, 400)
        self.setWindowTitle('Carregar Arquivo')

        self.text_edit = QTextEdit(self)
        self.load_button = QPushButton('Carregar', self)
        self.save_button = QPushButton('Salvar', self)

        layout = QVBoxLayout()
        layout.addWidget(self.text_edit)
        layout.addWidget(self.load_button)
        layout.addWidget(self.save_button)

        self.setLayout(layout)

        self.load_button.clicked.connect(self.load_file)
        self.save_button.clicked.connect(self.save_file)

    def load_file(self):
        options = QFileDialog.Options()
        options |= QFileDialog.ReadOnly
        file_name, _ = QFileDialog.getOpenFileName(self, "Escolher Arquivo", "", "All Files (*);;Text Files (*.txt)", options=options)

        if file_name:
            with open(file_name, 'r') as file:
                file_content = file.read()
                self.text_edit.setPlainText(file_content)

    def save_file(self):
        options = QFileDialog.Options()
        file_name, _ = QFileDialog.getSaveFileName(self, "Salvar Arquivo", "", "All Files (*);;Text Files (*.txt)", options=options)

        if file_name:
            with open(file_name, 'w') as file:
                file.write(self.text_edit.toPlainText())

if __name__ == '__main__':
    app = QApplication(sys.argv)
    window = FileEditorApp()
    window.show()
    sys.exit(app.exec_())
