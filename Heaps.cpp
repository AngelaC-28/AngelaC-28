#include <iostream>
#include <vector>
using namespace std;

// Function for Max-Heap
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

// Function for Min-Heap
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

int main() {
    vector<int> maxHeap;
    vector<int> minHeap;

    cout << "Welcome to the Treasure Sorting Challenge!\n\n";

    // Task 1: Insert treasures into Max-Heap
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

    cout << "\n--- Max-Heap completed! ---\n\n";

    // Task 2: Insert treasures into Min-Heap
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

    cout << "\n--- Min-Heap completed! ---\n\n";

    // Task Completion Message
    cout << "Congratulations! \nYou have successfully organized the treasures using both Max-Heap and Min-Heap.\n";
    cout << "You are now a certified Treasure Vault Manager!\n";

    return 0;
}