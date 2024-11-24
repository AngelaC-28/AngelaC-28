#include <iostream>
#include <vector>
#include <iomanip>
using namespace std;

// ANSI escape codes for color
#define RESET   "\033[0m"
#define RED     "\033[31m"
#define GREEN   "\033[32m"
#define YELLOW  "\033[33m"
#define BLUE    "\033[34m"
#define MAGENTA "\033[35m"
#define CYAN    "\033[36m"
#define WHITE   "\033[37m"
#define BOLD    "\033[1m"
#define BG_YELLOW "\033[43m"
#define BG_GREEN  "\033[42m"
#define BG_CYAN   "\033[46m"
#define BG_MAGENTA "\033[45m"

// Function to print the treasure background with color
void printTreasureBackground() {
    cout << "\n";
    cout << BG_YELLOW << "************************************************************\n" << RESET;
    cout << BG_YELLOW << "*                                                          *\n" << RESET;
    cout << BG_YELLOW << "*                        " << GREEN << "TREASURE VAULT" << BG_YELLOW << "                   *\n" << RESET;
    cout << BG_YELLOW << "*                                                          *\n" << RESET;
    cout << BG_YELLOW << "*   " << CYAN << "$$$$$$$$" << BG_YELLOW << "       $$$$$$$$       $$$$$$$$       $$$$$$$$ *\n" << RESET;
    cout << BG_YELLOW << "*   $$    $$       $$    $$       $$    $$       $$    $$ *\n" << RESET;
    cout << BG_YELLOW << "*   $$$$$$$$       $$$$$$$$       $$$$$$$$       $$$$$$$$ *\n" << RESET;
    cout << BG_YELLOW << "*                                                          *\n" << RESET;
    cout << BG_YELLOW << "************************************************************\n" << RESET;
}

void displayTreasureChest(){
    cout << "\n";
    cout << GREEN << "        _________________________\n";
    cout << "       |                         |\n";
    cout << "       |        " << MAGENTA << "TREASURE" << GREEN << "         |\n";
    cout << "       |_________________________|\n";
    cout << "      //=========================\\\\\n";
    cout << "     //🪙"    << "🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙"           "🪙🪙\\\\\n";
    cout << "    ||" << CYAN << "🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙🪙" << GREEN << "🪙🪙🪙||\n";
    cout << "    ||___________________________||\n";
    cout << "     \\\\=========================//\n" << RESET;
}

// Function to heapify downward for Max-Heap
void maxHeapify(vector<int>& heap, int n, int i) {
    int largest = i;
    int left = 2 * i + 1;
    int right = 2 * i + 2;

    if (left < n && heap[left] > heap[largest]) {
        largest = left;
    }
    if (right < n && heap[right] > heap[largest]) {
        largest = right;
    }
    if (largest != i) {
        swap(heap[i], heap[largest]);
        maxHeapify(heap, n, largest);
    }
}

// Function to heapify downward for Min-Heap
void minHeapify(vector<int>& heap, int n, int i) {
    int smallest = i;
    int left = 2 * i + 1;
    int right = 2 * i + 2;

    if (left < n && heap[left] < heap[smallest]) {
        smallest = left;
    }
    if (right < n && heap[right] < heap[smallest]) {
        smallest = right;
    }
    if (smallest != i) {
        swap(heap[i], heap[smallest]);
        minHeapify(heap, n, smallest);
    }
}

// Insert a treasure into the Max-Heap
void addTreasureToMaxHeap(vector<int>& heap, int value) {
    cout << "Adding treasure: " << value << " gold\n";
    heap.push_back(value);
    int i = heap.size() - 1;

    while (i > 0 && heap[i] > heap[(i - 1) / 2]) {
        swap(heap[i], heap[(i - 1) / 2]);
        i = (i - 1) / 2;
    }
}

// Insert a treasure into the Min-Heap
void addTreasureToMinHeap(vector<int>& heap, int value) {
    cout << "Adding treasure: " << value << " gold\n";
    heap.push_back(value);
    int i = heap.size() - 1;

    while (i > 0 && heap[i] < heap[(i - 1) / 2]) {
        swap(heap[i], heap[(i - 1) / 2]);
        i = (i - 1) / 2;
    }
}

// Display the Max-Heap
void displayMaxHeap(const vector<int>& heap) {
    cout << "Current treasures by value (Max-Heap):\n";
    for (int value : heap) {
        cout << value << " ";
    }
    cout << endl;
}

// Display the Min-Heap
void displayMinHeap(const vector<int>& heap) {
    cout << "Current treasures by value (Min-Heap):\n";
    for (int value : heap) {
        cout << value << " ";
    }
    cout << endl;
}

// Task 3: Extract Max/Min from the heap
void extractMax(vector<int>& heap) {
    if (heap.empty()) {
        cout << "Heap is empty! No treasure to extract.\n";
        return;
    }

    int maxTreasure = heap[0];
    cout << "Extracting the maximum treasure: " << maxTreasure << " gold\n";

    // Swap the root with the last element and remove the last element
    swap(heap[0], heap[heap.size() - 1]);
    heap.pop_back();

    // Heapify the root to maintain the heap property
    maxHeapify(heap, heap.size(), 0);

    cout << "Updated Max-Heap after extraction: ";
    displayMaxHeap(heap);
}

void extractMin(vector<int>& heap) {
    if (heap.empty()) {
        cout << "Heap is empty! No treasure to extract.\n";
        return;
    }

    int minTreasure = heap[0];
    cout << "Extracting the minimum treasure: " << minTreasure << " gold\n";

    // Swap the root with the last element and remove the last element
    swap(heap[0], heap[heap.size() - 1]);
    heap.pop_back();

    // Heapify the root to maintain the heap property
    minHeapify(heap, heap.size(), 0);

    cout << "Updated Min-Heap after extraction: ";
    displayMinHeap(heap);
}

// Task 3: Extract treasures from the heap
void extractTreasureFromHeap(vector<int>& maxHeap, vector<int>& minHeap) {
    // Extract treasure from Max-Heap
    cout << "\n--- " << CYAN << "Extracting treasures from the Max-Heap" << RESET << " ---\n";
    extractMax(maxHeap);

    // Extract treasure from Min-Heap
    cout << "\n--- " << CYAN << "Extracting treasures from the Min-Heap" << RESET << " ---\n";
    extractMin(minHeap);
}

int main() {
    vector<int> maxHeap;
    vector<int> minHeap;

    // Print themed background and header
    printTreasureBackground();
    cout << GREEN << "Welcome to the Treasure Sorting Challenge!" << RESET << "\n";

    // Display treasure chest
    displayTreasureChest();

    // Task 1: Insert treasures into Max-Heap
    cout << "\n--- " << CYAN << "Adding treasures into the Max-Heap" << RESET << " ---\n";
    cout << string(60, '=') << endl;

    // Treasure chest art
    displayTreasureChest();

    // Task 1: Insert treasures into Max-Heap
    cout << "\n--- Task 1: Sorting treasures into Max-Heap ---\n";
    addTreasureToMaxHeap(maxHeap, 100);
    displayMaxHeap(maxHeap);

    addTreasureToMaxHeap(maxHeap, 50);
    displayMaxHeap(maxHeap);

    addTreasureToMaxHeap(maxHeap, 75);
    displayMaxHeap(maxHeap);

    addTreasureToMaxHeap(maxHeap, 200);
    displayMaxHeap(maxHeap);

    addTreasureToMaxHeap(maxHeap, 25);
    displayMaxHeap(maxHeap);

    cout << "\n--- Max-Heap completed! ---\n";

    // Task 2: Insert treasures into Min-Heap
    cout << "\n--- Task 2: Sorting treasures into Min-Heap ---\n";
    addTreasureToMinHeap(minHeap, 100);
    displayMinHeap(minHeap);

    addTreasureToMinHeap(minHeap, 50);
    displayMinHeap(minHeap);

    addTreasureToMinHeap(minHeap, 75);
    displayMinHeap(minHeap);

    addTreasureToMinHeap(minHeap, 200);
    displayMinHeap(minHeap);

    addTreasureToMinHeap(minHeap, 25);
    displayMinHeap(minHeap);

    cout << "\n--- Min-Heap completed! ---\n";

    // Task 3: Extract treasures from both Max-Heap and Min-Heap
    cout << "\n--- Task 3: Extracting treasures ---\n";
    extractTreasureFromHeap(maxHeap, minHeap);

    // Congratulatory message
    cout << GREEN << "Congratulations! You have organized and extracted the treasures successfully." << RESET << "\n";
    cout << GREEN << "You are now a certified Treasure Vault Manager!" << RESET << "\n";

    // Closing background
    printTreasureBackground();

    return 0;
}