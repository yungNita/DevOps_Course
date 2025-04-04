package tp;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.SwingConstants;
import javax.swing.SwingUtilities;

/**
 * A simple Java desktop application that displays a window with a message.
 */
public final class App {

    private static final int FRAME_WIDTH = 400;
    private static final int FRAME_HEIGHT = 300;

    private App() {
        // Prevent instantiation
    }

    /**
     * Says hello to the world.
     * @param args The arguments of the program.
     */
    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            JFrame frame = new JFrame("Simple Java Desktop App");
            JLabel label = new JLabel("Hello from Java!", SwingConstants.CENTER);
            frame.add(label);
            frame.setSize(FRAME_WIDTH, FRAME_HEIGHT);
            frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
            frame.setVisible(true);
        });
    }
}
